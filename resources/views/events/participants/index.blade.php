@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="main">
            @if (Session::has('flash_message'))
                <div class="alert alert-danger alert-dismissable" style="z-index: 10; opacity: 1;">
                    <button type="button" class="close" data-dismiss="alert" title="Close Message" aria-hidden="true">&times;</button>
                    <p>{{ Session::get('flash_message') }}</p>
                </div>
            @endif
            @yield('main')
        </div>
        <div class="row">
            <div class="jumbotron">
                <h2>All invited</h2>

                <p class="lead">All invited participants for event - {{$event->description}}</p>

                <p>Click <a class="btn btn-sm btn-success" href="{{URL::to('events/'.$event->id.'/participant/approved')}}" role="button">View</a> to view List of Participants with Permission/Payment</p>
            </div>

            <div class="col-lg-3 col-md-3">
                <table class="table">
                    <caption>Students</caption>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th></th>
                    </tr>

                    @foreach($students as $student)
                        <tr>
                            <td>{{$student->id}}</td>
                            <td>{{$student->name}}</td>
                            <td>
                                @if($student->pivot->has_permission)
                                    <span class="text-success">Got Permission</span>
                                @else
                                    <a href="{{URL::to('events/'.$event->id.'/participant/'.$student->id.'/purchase?type=students')}}"><button class="btn-small btn-warning">Purchase Ticket</button></a>
                                @endif
                            </td>
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
                        <th></th>
                    </tr>

                    @foreach($parents as $parent)
                        <tr>
                            <td>{{$parent->id}}</td>
                            <td>{{$parent->name}}</td>
                            <td>
                                @if($parent->pivot->has_permission)
                                    <span class="text-success">Got Permission</span>
                                @else
                                    <a href="{{URL::to('events/'.$event->id.'/participant/'.$parent->id.'/purchase?type=parents')}}"><button class="btn-small btn-warning">Purchase Ticket</button></a>
                                @endif
                            </td>
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
                        <th></th>
                    </tr>

                    @foreach($staffs as $staff)
                        <tr>
                            <td>{{$staff->id}}</td>
                            <td>{{$staff->name}}</td>
                            <td>
                                @if($staff->pivot->has_permission)
                                    <span class="text-success">Got Permission</span>
                                @else
                                    <a href="{{URL::to('events/'.$event->id.'/participant/'.$staff->id.'/purchase?type=staffs')}}"><button class="btn-small btn-warning">Purchase Ticket</button></a>
                                @endif
                            </td>
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
                        <th></th>
                    </tr>

                    @foreach($volunteers as $volunteer)
                        <tr>
                            <td>{{$volunteer->id}}</td>
                            <td>{{$volunteer->name}}</td>
                            <td>
                                @if($volunteer->pivot->has_permission)
                                    <span class="text-success">Got Permission</span>
                                @else
                                    <a href="{{URL::to('events/'.$event->id.'/participant/'.$volunteer->id.'/purchase?type=volunteers')}}"><button class="btn-small btn-warning">Purchase Ticket</button></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>

                <a href="{{URL::to('events/'.$event->id.'/participants/update?type=volunteers')}}"><button class="btn btn-primary">Update</button></a>
            </div>

        </div>
    </div>
@endsection
