@extends('layouts.app')

@section('content')
    <div class="container">

        <h2 class="header"><strong>Create Event</strong></h2>

        <div class="col-lg-12">
            {!! Form::open(['url' => 'events', 'method' => 'POST']) !!}

            {!! Form::label('event_type_id', 'Event Type') !!}
            {!! Form::select('event_type_id', $eventTypes, [], array('class' => 'form-control')) !!}

            {!! Form::label('description', 'Description') !!}
            {!! Form::input('text', 'description', '', array('class' => 'form-control')) !!}

            {!! Form::label('event_time', 'Time') !!}
            {!! Form::input('datetime', 'event_time', '', array('class' => 'form-control')) !!}

            {!! Form::label('venue', 'Venue') !!}
            {!! Form::input('text', 'venue', '', array('class' => 'form-control')) !!}

            {!! Form::submit('Create', array('class' => 'form-control btn btn-primary')) !!}
            {!! Form::close() !!}
        </div>
        <footer class="footer">
            <p>&copy; Sentral challenge test - Jialei</p>
        </footer>
    </div>
@endsection
