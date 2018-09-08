@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="jumbotron">
                <h2>All Events</h2>

                <p class="lead">You can view all events/activities here</p>

                <p><a class="btn btn-lg btn-success" href="events/create" role="button">Create Event</a></p>
            </div>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Time</th>
                    <th>Venue</th>
                    <th></th>
                    <th></th>
                </tr>

                @foreach($events as $event)
                    <tr>
                        <td>{{$event->id}}</td>
                        <td>{{$event->description}}</td>
                        <td>{{$event->event_type_id}}</td>
                        <td>{{$event->event_time}}</td>
                        <td>{{$event->venue}}</td>
                        <td>
                            <a href="{{URL::to('events/'.$event->id.'/edit')}}"><button class="btn btn-primary">Edit</button></a>
                            <a href="{{URL::to('events/delete')}}"><button class="btn btn-primary">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
