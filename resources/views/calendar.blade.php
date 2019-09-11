@extends('layouts.master')

@section('content')

@section('links')
<link href="{{ asset('assets/libs/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet" />
<link href="{{ asset('assets/extra-libs/calendar/calendar.css')}}" rel="stylesheet" />
@endsection
<div class="col-md-12">
        <div class="card">
            <div class="">
                <div class="row">
                 
                    <div class="col-lg-9">
                        <div class="card-body b-l calender-sidebar">
                                {!! $calendar->calendar() !!}
                                {!! $calendar->script() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @section('scripts')
        <script src="{{ asset('assets/libs/moment/min/moment.min.js')}}"></script>
        <script src="{{ asset('assets/libs/fullcalendar/dist/fullcalendar.min.js')}}"></script>
        <script src="{{ asset('dist/js/pages/calendar/cal-init.js')}}"></script>
        @endsection
@endsection