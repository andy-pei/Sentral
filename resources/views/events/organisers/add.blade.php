@extends('layouts.app')

@section('content')
    <div class="container">

        <h2 class="header"><strong>Add Organiser</strong></h2>

        <div class="col-lg-12">
            {!! Form::open(['url' => 'events/'.$event->id.'/organisers/add', 'method' => 'POST']) !!}

            {!! Form::label('organisers', 'Organisers') !!}
            {!! Form::select('organisers[]', $organisers, [], array('class' => 'form-control', 'multiple')) !!}

            {!! Form::submit('Add', array('class' => 'form-control btn btn-primary')) !!}
            {!! Form::close() !!}
        </div>
        <footer class="footer">
            <p>&copy; Sentral challenge test - Jialei</p>
        </footer>
    </div>
@endsection
