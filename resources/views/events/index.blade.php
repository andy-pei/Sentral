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
        </div>
    </div>
@endsection

@section('footer')

    <script type="text/javascript">
        var events = {!! $eventsPresenter->toJson() !!};
        var eventTypes = {!! $eventTypesAsJson !!};
    </script>

    <script src="/js/compiled/events.js"></script>
@stop
