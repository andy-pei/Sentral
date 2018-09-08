@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="jumbotron">
                <h2>All invited</h2>

                <p class="lead">All invited participants for event - {{$event->description}}</p>
            </div>

            <div class="col-lg-3 col-md-3">
                <table class="table">
                    <caption>Students</caption>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                    </tr>

                    @foreach($students as $student)
                        <tr>
                            <td>{{$student->id}}</td>
                            <td>{{$student->name}}</td>
                        </tr>
                    @endforeach
                </table>

                <a href="{{URL::to('events/'.$event->id.'/participants/update?type=students')}}"><button class="btn btn-primary">Update</button></a>
            </div>

            <div class="col-lg-3 col-md-3">
                <table class="table">
                    <caption>Parents</caption>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                    </tr>

                    @foreach($parents as $parent)
                        <tr>
                            <td>{{$parent->id}}</td>
                            <td>{{$parent->name}}</td>
                        </tr>
                    @endforeach
                </table>

                <a href="{{URL::to('events/'.$event->id.'/participants/update?type=parents')}}"><button class="btn btn-primary">Update</button></a>

            </div>

            <div class="col-lg-3 col-md-3">
                <table class="table">
                    <caption>Staffs</caption>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                    </tr>

                    @foreach($staffs as $staff)
                        <tr>
                            <td>{{$staff->id}}</td>
                            <td>{{$staff->name}}</td>
                        </tr>
                    @endforeach
                </table>

                <a href="{{URL::to('events/'.$event->id.'/participants/update?type=staffs')}}"><button class="btn btn-primary">Update</button></a>
            </div>

            <div class="col-lg-3 col-md-3">
                <table class="table">
                    <caption>Volunteers</caption>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                    </tr>

                    @foreach($volunteers as $volunteer)
                        <tr>
                            <td>{{$volunteer->id}}</td>
                            <td>{{$volunteer->name}}</td>
                        </tr>
                    @endforeach
                </table>

                <a href="{{URL::to('events/'.$event->id.'/participants/update?type=volunteers')}}"><button class="btn btn-primary">Update</button></a>
            </div>

        </div>
    </div>
@endsection
