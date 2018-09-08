@extends('layouts.app')

@section('content')
    <div class="container">

        <h2 class="header"><strong>Purchase Ticket of Event {{$event->description}} for {{$participant->name}}</strong></h2>

        <div class="col-lg-12">
            {!! Form::open(['url' => 'events/'.$event->id.'/participant/'.$participant->id.'/purchase', 'method' => 'POST']) !!}

            {!! Form::label('amount', 'Amount') !!}
            {!! Form::input('text', 'amount', '', array('class' => 'form-control')) !!}

            {!! Form::hidden('type', $participantType) !!}

            {!! Form::submit('Submit', array('class' => 'form-control btn btn-primary')) !!}
            {!! Form::close() !!}
        </div>
        <footer class="footer">
            <p>&copy; Sentral challenge test - Jialei</p>
        </footer>
    </div>
@endsection
