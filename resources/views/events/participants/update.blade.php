@extends('layouts.app')

@section('content')
    <div class="container">

        <h2 class="header"><strong>Update Participants</strong></h2>

        <div class="col-lg-12">
            {!! Form::open(['url' => 'events/'.$event->id.'/participants/update?type='.$participantType, 'method' => 'POST']) !!}

            {!! Form::label('participants', $participantType) !!}
            {!! Form::select('participants[]', $participants, [], array('class' => 'form-control', 'multiple')) !!}

            {!! Form::submit('Update', array('class' => 'form-control btn btn-primary')) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
