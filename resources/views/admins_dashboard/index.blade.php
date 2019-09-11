@extends('layouts.admin_master')

@section('content')


@section('links')
<link href="{{ asset('assets/libs/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet" />
<link href="{{ asset('assets/extra-libs/calendar/calendar.css')}}" rel="stylesheet" />
@endsection




<div class="row">
        <!-- column -->
        <div class="col-lg-4">
            <div class="card  card-hover">
                <div class="card-body">
                    <h4 class="card-title">Customers</h4>
                    <div class="d-flex no-block align-items-center mt-4">
                        <div class="">
                        <span class="">Total =</span><h3 class="font-medium mb-0"></h3></div>
                        <div class="ml-auto">
                            <div style="max-width:150px; height:60px;" class="mb-5">
                                <canvas id="bouncerate"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-lg-4">
            <div class="card  card-hover">
                <div class="card-body">
                    <h4 class="card-title">Photoshoots</h4>
                    <div class="d-flex no-block align-items-center mt-4">
                        <div class="">
                        <span class="">Total =</span><h3 class="font-medium mb-0"></h3></div>
                        <div class="ml-auto">
                            <div style="max-width:150px; height:60px;" class="mb-5">
                                <canvas id="bouncerate"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-lg-4">
            <div class="card  card-hover">
                <div class="card-body">
                    <h4 class="card-title">Revenue</h4>
                    <div class="d-flex no-block align-items-center mt-4">
                        <div class="">
                        <span class="">Total =</span><h3 class="font-medium mb-0">Ksh </h3></div>
                        <div class="ml-auto">
                            <div style="max-width:150px; height:60px;" class="mb-5">
                                <canvas id="bouncerate"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="col-md-12">
        <div class="card">
            <div class="">
                <div class="row">
                    <div class="col-lg-3 border-right p-r-0">
                        <div class="card-body border-bottom">




                            
                            <h4 class="card-title m-t-10">Today's photoshoots</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="table-responsive">
                                                <table class="table no-wrap v-middle">
                                                    <thead>
                                                        <tr class="border-0">
                                                            <th class="border-0 text-uppercase font-weight-bold"> Name</th>
                                                            <th class="border-0 text-uppercase font-weight-bold">Time</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       {{-- @foreach($carMake as $car)--}}
                                                        <tr>
                                                        <td class="font-weight-bold"></td>
                                                        <td class="font-weight-bold"></td>
                                                        </tr>
                                                      {{--  @endforeach--}}
                                                    </tbody>
                                                </table>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
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