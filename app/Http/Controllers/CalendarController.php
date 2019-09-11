<?php

namespace App\Http\Controllers;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;


use Illuminate\Http\Request;
use App\Booking;

class CalendarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $events = [];
        $data = Booking::all();
        if($data->count()) {
            foreach ($data as $key => $value) {

                $start_date_time = $value->date.'T'.$value->time;
                $end_date_time = $value->date.'T'.$value->time;

                $events[] = Calendar::event(
                    $value->user->name,
                    false,
                    //new \DateTime($value->start_date),
                    new \DateTime($start_date_time),

                    //new \DateTime($value->end_date.' +1 day'),
                    new \DateTime($end_date_time),
                    //null,
                    $value->id,
                    // Add color and link on event
	                [
	                    'color' => '#f05050',
	                   // 'url' => 'pass here url and any route',
	                ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
        return view('calendar', compact('calendar'));
    }
}
