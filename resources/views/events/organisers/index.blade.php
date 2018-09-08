@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="jumbotron">
                <h2>Organisers For Event - {{$event->description}}</h2>

                <p class="lead">You can add/remove organisers here</p>

                <p><a class="btn btn-lg btn-success" href="{{URL::to('/events/'.$event->id.'/organisers/add')}}" role="button">Update Organiser</a></p>
            </div>
            <div>
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Description</th>
                    </tr>

                    @foreach($organisers as $organiser)
                        <tr>
                            <td>{{$organiser->id}}</td>
                            <td>{{$organiser->name}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>
@endsection
