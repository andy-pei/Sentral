@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="jumbotron">
                <h2>All Events</h2>

                <p class="lead">You can view all events/activities here</p>

                <p><a class="btn btn-lg btn-success" href="events/create" role="button">Create Event</a></p>
            </div>

            <div id="events" class="row"></div>

            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Time</th>
                    <th>Venue</th>
                    <th>Driving</th>
                    <th>Walking</th>
                    <th style="min-width: 300px;"></th>
                </tr>

                @foreach($events as $event)
                    <tr>
                        <td>{{$event->id}}</td>
                        <td>{{$event->description}}</td>
                        <td>{{$event->event_type_id}}</td>
                        <td>{{$event->event_time}}</td>
                        <td>{{$event->venue}}</td>
                        <td>{{$event->driving_distance . ' / ' . $event->driving_duration}}</td>
                        <td>{{$event->walking_distance . ' / ' . $event->walking_duration}}</td>
                        <td>
                            <a href="{{URL::to('events/'.$event->id.'/organisers')}}"><button class="btn-sm btn-primary">Organisers</button></a>
                            <a href="{{URL::to('events/'.$event->id.'/participants')}}"><button class="btn-sm btn-primary">Invited</button></a>
                            <a href="{{URL::to('events/'.$event->id.'/edit')}}"><button class="btn-sm btn-primary">Edit</button></a>
                            <a href="{{URL::to('events/delete/'.$event->id)}}"><button class="btn-sm btn-primary">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

@section('footer')

    <script type="text/javascript">
        var posts = {!! $eventsPresenter->toJson() !!};
        var eventTypes = {!! $eventTypesAsJson !!};
        debugger;
    </script>

    <script src="/js/compiled/events.js"></script>
@stop
