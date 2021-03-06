<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 7/9/18
 * Time: 11:11 PM
 */

namespace App\Services;


use App\Models\EventModel;
use App\Repositories\EventRepository;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class EventService
{
    /**
     * @var EventRepository
     */
    private $eventRepository;
    /**
     * @var Client
     */
    private $client;

    /**
     * EventService constructor.
     * @param EventRepository $eventRepository
     * @param Client $client
     */
    public function __construct(EventRepository $eventRepository,
                                Client $client)
    {
        $this->eventRepository = $eventRepository;
        $this->client = $client;
    }

    public function allEvents()
    {
        return $this->eventRepository->findAll();
    }

    public function createEvent($data)
    {
        $formattedAddress = str_replace(' ', '+', array_get($data, 'venue'));
        $drivingDistance = '';
        $drivingDuration = '';

        try {
            $response = $this->client->get(config('directionsapi.base_url') . '?origin=' . config('directionsapi.origin_address') . '&destination=' . $formattedAddress . '&key=' . config('directionsapi.key'));
        } catch (ClientException $e) {
            \Log::info('EventService (createEvent): ' . $e->getMessage());
        }

        if($response->getStatusCode() == 200) {
            $locationDetails = json_decode((String)$response->getBody(), true);
            $drivingDistance = array_get($locationDetails, 'routes.0.legs.0.distance.text');
            $drivingDuration = array_get($locationDetails, 'routes.0.legs.0.duration.text');

        }

        //walking
        try {
            $response = $this->client->get(config('directionsapi.base_url') . '?origin=' . config('directionsapi.origin_address') . '&destination=' . $formattedAddress . '&mode=walking&key=' . config('directionsapi.key'));
        } catch (ClientException $e) {
            \Log::info('EventService (createEvent): ' . $e->getMessage());
        }

        if($response->getStatusCode() == 200) {
            $locationDetails = json_decode((String)$response->getBody(), true);
            $walkingDdistance = array_get($locationDetails, 'routes.0.legs.0.distance.text');
            $walkingDuration = array_get($locationDetails, 'routes.0.legs.0.duration.text');

        }

        $data = array_merge(array_only($data, ['event_type_id', 'description', 'event_time', 'venue', 'ticket_price']), ['driving_distance' => $drivingDistance, 'driving_duration' => $drivingDuration, 'walking_distance' => $walkingDdistance, 'walking_duration' => $walkingDuration]);

        $this->eventRepository->create($data);
    }

    public function getEventById($id) {
        return $this->eventRepository->find($id);
    }

    public function updateWithId($id, $data)
    {
        return $this->eventRepository->updateWithId($id, array_only($data, ['event_type_id', 'description', 'event_time', 'venue', 'ticket_price']));
    }

    public function deleteById($id)
    {
        return $this->eventRepository->deleteById($id);
    }

    public function storeOrganisers($eventId, $organisers)
    {
        $event = $this->getEventById($eventId);
        $event->organisers()->sync($organisers);
    }

    public function participantsForType($type)
    {

        switch ($type) {
            case 'students':
                $studentService = app(StudentService::class);
                return $studentService->getAllWithIdName();
            case 'parents':
                $parentService = app(ParentService::class);
                return $parentService->getAllWithIdName();
            case 'staffs':
                $staffService = app(StaffService::class);
                return $staffService->getAllWithIdName();
            case 'volunteers':
                $volunteerService = app(VolunteerService::class);
                return $volunteerService->getAllWithIdName();
            default:
                \Log::error('EventService (participantsForType): Invalid Participant Type - ' . $type);

        }
    }

    public function storeParticipants($eventId, $participants, $participantType)
    {
        $event = $this->getEventById($eventId);
        $participantTypesWithFreeEntry = config('permission.free_entry');
        if(in_array($participantType, $participantTypesWithFreeEntry)) {
            $participantsTemp = array();
            foreach ($participants as $participant) {
                $participantsTemp[$participant] = array('has_permission' => true);
            }
            $event->{$participantType}()->sync($participantsTemp);
        } else {
            $event->{$participantType}()->sync($participants);
        }
    }

    public function getInvitedParticipants(EventModel $event)
    {
        $students = $event->students;
        $parents = $event->parents;
        $staffs = $event->staffs;
        $volunteers = $event->volunteers;

        return [
            'students' => $students,
            'parents' => $parents,
            'staffs' => $staffs,
            'volunteers' => $volunteers,
        ];
    }

    public function getParticipantByTypeAndId($type, $id)
    {
        switch ($type) {
            case 'students':
                $studentService = app(StudentService::class);
                return $studentService->getById($id);
            case 'parents':
                $parentService = app(ParentService::class);
                return $parentService->getById($id);
            case 'staffs':
                $staffService = app(StaffService::class);
                return $staffService->getById($id);
            case 'volunteers':
                $volunteerService = app(VolunteerService::class);
                return $volunteerService->getById($id);
            default:
                \Log::error('EventService (getParticipantByTypeAndId): Invalid Participant Type - ' . $type);
        }
    }

    public function getAllApprovedParticipants(EventModel $event)
    {
        $students = $event->students()->where('participantables.has_permission', 1)->get();
        $parents = $event->parents()->where('participantables.has_permission', 1)->get();
        $staffs = $event->staffs()->where('participantables.has_permission', 1)->get();
        $volunteers = $event->volunteers()->where('participantables.has_permission', 1)->get();

        return [
            'students' => $students,
            'parents' => $parents,
            'staffs' => $staffs,
            'volunteers' => $volunteers,
        ];
    }
}