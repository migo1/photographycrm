<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use Mail;
use App\Mail\BookingMail;

class BookingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
           // 'user_id'=>'required',
            'category_id' => 'required',
            'size_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'total_photos' => 'required',
          //  'charges' => 'required',
           // 'payment_status' => 'required',
        ]);

        $booking = new Booking;

        $booking->user_id = auth()->user()->id;
        $booking->category_id = $request->input('category_id');
        $booking->size_id = $request->input('size_id');
        $booking->date = $request->input('date');
        $booking->time = $request->input('time');
        $booking->total_photos = $request->input('total_photos');
        $booking->charges = $booking->size->amount*$booking->total_photos;
        $booking->payment_status = $request->input('payment_status');

        
// ;
      //  dd($booking);
 
        $booking->save();

        \Mail::to($booking->user->email)->send(new BookingMail($booking));
        
        return back()->with('success','Photoshoot booked successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->validate($request,[
            // 'user_id'=>'required',
             'category_id' => 'required',
             'size_id' => 'required',
             'date' => 'required',
             'time' => 'required',
             'total_photos' => 'required',
           //  'charges' => 'required',
            // 'payment_status' => 'required',
         ]);


        $booking =  Booking::findOrFail($request->book_id);

        $booking->user_id = $request->input('user_id');
        $booking->category_id = $request->input('category_id');
        $booking->size_id = $request->input('size_id');
        $booking->date = $request->input('date');
        $booking->time = $request->input('time');
        $booking->total_photos = $request->input('total_photos');
        $booking->charges = $booking->size->amount*$booking->total_photos;
        $booking->payment_status = $request->input('payment_status');

        $booking->update();

        return back()->with('success','Photoshoot booked successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $booking =  Booking::findOrFail($request->book_id);

        $booking->delete();

        return back();
        
    }
}
