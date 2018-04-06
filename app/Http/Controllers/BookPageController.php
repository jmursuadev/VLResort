<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Cottage;
use App\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        $cottages = Cottage::all();
        return view('pages.book.index',['rooms' => $rooms,'cottages' => $cottages]);
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
        $request->validate([
            'room' => 'required_without:cottage',
            'no_of_room' => 'required_with:room',
            'cottage' => 'required_without:room',
            'no_of_cottage' => 'required_with:cottage',
            'pax' => 'required|numeric',
            'checkin' => 'required|date',
            'checkout' => 'required_with:room|nullable|date|after:checkin'
        ]);

        if(!empty($request->get('room')) && !empty($request->get('cottage'))){
            $end = Carbon::parse($request->get('checkout'));
            $start = Carbon::parse($request->get('checkin'));

            $days = $start->diffInDays($end);

            $room = Room::find($request->get('room'));
            $cottage = Cottage::find($request->get('cottage'));
            $book = new Booking();
            $book->user_id = Auth::user()->id;
            $book->room_id = $room->id;
            $book->no_of_room = $request->get('no_of_room');
            $book->cottage_id = $cottage->id;
            $book->no_of_cottage = $request->get('no_of_cottage');
            $book->checkin = $request->get('checkin');
            $book->checkout = $request->get('checkout');
            $book->pax = $request->get('pax');
            $book->price =  ($request->get('no_of_room') * $room->price * $days) + ($request->get('no_of_cottage') * $cottage->price);
            $book->pax = $request->get('pax');
            $book->save();

            return response()->json($book);
        }

        if(!empty($request->get('room'))){
            $room = Room::find($request->get('room'));
            $end = Carbon::parse($request->get('checkout'));
            $start = Carbon::parse($request->get('checkin'));

            $days = $start->diffInDays($end);

            $book = new Booking();
            $book->user_id = Auth::user()->id;
            $book->room_id = $room->id;
            $book->no_of_room = $request->get('no_of_room');
            $book->no_of_cottage = 0;
            $book->checkin = $request->get('checkin');
            $book->checkout = $request->get('checkout');
            $book->pax = $request->get('pax');
            $book->price =  ($request->get('no_of_room') * $room->price * $days);
            $book->pax = $request->get('pax');
            $book->save();

            return response()->json($book);
        }

        if(!empty($request->get('cottage'))){
            $cottage = Cottage::find($request->get('cottage'));

            $book = new Booking();
            $book->user_id = Auth::user()->id;
            $book->cottage_id = $cottage->id;
            $book->no_of_cottage = $request->get('no_of_cottage');
            $book->no_of_room = 0;
            $book->checkin = $request->get('checkin');
            $book->checkout = $request->get('checkout');
            $book->pax = $request->get('pax');
            $book->price =  ($request->get('no_of_cottage') * $cottage->price);
            $book->pax = $request->get('pax');
            $book->save();

            return response()->json($book);
        }
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
