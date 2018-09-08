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

class EventService
{
    /**
     * @var EventRepository
     */
    private $eventRepository;

    /**
     * EventService constructor.
     * @param EventRepository $eventRepository
     */
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function allEvents()
    {
        return $this->eventRepository->findAll();
    }

    public function createEvent($data)
    {
        $this->eventRepository->create(array_only($data, ['event_type_id', 'description', 'event_time', 'venue']));
    }

    public function getEventById($id) {
        return $this->eventRepository->find($id);
    }

    public function updateWithId($id, $data)
    {
        return $this->eventRepository->updateWithId($id, array_only($data, ['event_type_id', 'description', 'event_time', 'venue']));
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
                \Log::error('EventService (participantsForType): Invalid Participant Type');

        }
    }

    public function storeParticipants($eventId, $participants, $participantType)
    {
        $event = $this->getEventById($eventId);
        $event->{$participantType}()->sync($participants);
    }
}