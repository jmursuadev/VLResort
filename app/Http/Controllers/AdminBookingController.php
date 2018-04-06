<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Payment;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
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
        //
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
        $book = Booking::find($id);

        $count = $book->payment()->count();

        if($count > 0){
            $payment = $book->payment->last();
            return response()->json($payment);
        }else{
            $array = array(
                'balance' => $book->price
            );

            return response()->json($array);
        }
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
        $book = Booking::find($id);
        $book->remarks = $request->get('remarks');
        $book->status = 'declined';
        $book->save();
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

    public function payment(Request $request)
    {
        $book = Booking::find($request->get('book_id'));
        if($request->get('balance') < $request->get('payment')){
            $array = array(
              'status' => 'error'
            );
            return response()->json($array);
        }
        $total = ($request->get('balance') - $request->get('payment'));
        $payment = new Payment;
        $payment->book_id = $book->id;
        $payment->balance = $total;
        $payment->payment = $request->get('payment');
        $payment->save();
        if($total == 0 || $total == null){
            $payment->status = 'paid';
            $payment->save();
            $book->remarks = 'paid';
            $book->status = 'approved';
            $book->save();
        }else{
            $book->remarks = $request->get('remarks');
            $book->save();
        }
        $array = array(
            'status' => 'success'
        );
        return response()->json($array);
    }

    public function pending(Request $request)
    {
        return view('admin.booking.pending');
    }

    public function show_pending(Request $request)
    {
        $pending = Booking::where('status','pending')->get();
        $response='';
        foreach($pending as $p)
        {
            $room = '';
            if(isset($p->room->room_name)){
                $room = $p->room->room_name;
            }
            $cottage = '';
            if(isset($p->cottage->cottage_name)){
                $cottage = $p->cottage->cottage_name;
            }
            $response.='<tr>
                <td>'.$room.'</td>
                <td>'.$p->no_of_room.'</td>
                <td>'.$cottage.'</td>
                <td>'.$p->no_of_cottage.'</td>
                <td>'.$p->checkin.'</td>
                <td>'.$p->checkout.'</td>
                <td>'.$p->pax.'</td>
                <td>'.$p->price.'</td>
                <td>'.$p->remarks.'</td>
                <td>'.$p->status.'</td>
                <td><button type="button" class="btn btn-primary payment" data-id="'.$p->id.'">Payment</button><button type="button" class="btn btn-danger cancel" data-id="'.$p->id.'">Cancel</button></td></tr>';
        }
        return response()->json($response);
    }

    public function approved(Request $request)
    {
        return view('admin.booking.approved');
    }

    public function show_approved(Request $request)
    {
        $approved = Booking::where('status','approved')->get();
        $response='';
        foreach($approved as $p)
        {
            $room = '';
            if(isset($p->room->room_name)){
                $room = $p->room->room_name;
            }

            $cottage = '';
            if(isset($p->cottage->cottage_name)){
                $cottage = $p->cottage->cottage_name;
            }

            $response.='<tr>
                <td>'.$room.'</td>
                <td>'.$p->no_of_room.'</td>
                <td>'.$cottage.'</td>
                <td>'.$p->no_of_cottage.'</td>
                <td>'.$p->checkin.'</td>
                <td>'.$p->checkout.'</td>
                <td>'.$p->pax.'</td>
                <td>'.$p->price.'</td>
                <td>'.$p->remarks.'</td>
                <td>'.$p->status.'</td></tr>';
        }
        return response()->json($response);
    }
}
