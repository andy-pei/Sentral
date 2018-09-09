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
                <h2>All Participants with Permission/Payment for Event - {{$event->description}}</h2>

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

            </div>

        </div>
    </div>
@endsection
