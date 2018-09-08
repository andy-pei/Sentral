<?php

namespace App\Http\Controllers;

use App\Services\EventService;
use App\Services\EventTypeService;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
