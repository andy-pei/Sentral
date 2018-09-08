<?php

namespace App\Http\Controllers;

use App\Services\EventService;
use App\Services\EventTypeService;
use App\Services\OrganiserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class EventsController extends Controller
{
    /**
     * @var EventService
     */
    private $eventService;
    /**
     * @var EventTypeService
     */
    private $eventTypeService;

    /**
     * EventsController constructor.
     * @param EventService $eventService
     * @param EventTypeService $eventTypeService
     */
    public function __construct(EventService $eventService,
                                EventTypeService $eventTypeService)
    {
        $this->eventService = $eventService;
        $this->eventTypeService = $eventTypeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = $this->eventService->allEvents();
        return view('events.index')->with([
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventTypes = $this->eventTypeService->getAllEventTypesWithIdName();
        return view('events.create')->with([
            'eventTypes' => $eventTypes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->eventService->createEvent(Input::all());
        return redirect('events');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventTypes = $this->eventTypeService->getAllEventTypesWithIdName();
        $event = $this->eventService->getEventById($id);
        return view('events/edit')->with([
            'event' => $event,
            'eventTypes' => $eventTypes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->eventService->updateWithId($id, Input::all());

        return redirect('events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->eventService->deleteById($id);
        return redirect('events');
    }

    public function organisers($eventId)
    {
        $event = $this->eventService->getEventById($eventId);
        if($event) {
            $organisers = $event->organisers;;

        }

        return view('events.organisers.index')->with([
            'organisers' => $organisers,
            'event' => $event
        ]);
    }

    public function addOrganisers($eventId, OrganiserService $organiserService)
    {
        $organisers = $organiserService->getAllWithIdName();
        $event = $this->eventService->getEventById($eventId);
        return view('events.organisers.update')->with([
            'event' => $event,
            'organisers' => $organisers
        ]);
    }

    public function storeOrganisers($eventId)
    {
        $this->eventService->storeOrganisers($eventId, Input::get('organisers'));
        return redirect('events/'.$eventId.'/organisers');
    }
}
