<?php

namespace App\Http\Controllers;

use App\Room;
use File;
use Illuminate\Http\Request;
use Image;

class AdminRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.room.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'room_name' => 'required',
            'description' => 'required',
            'guestmax' => 'required',
            'price' => 'numeric|required',
            'file' => 'nullable|image|mimes:jpeg,jpg,png|max:1000'
        ]);

        $room = new Room;
        $room->room_name = $request->get('room_name');
        $room->description = $request->get('description');
        $room->GuestMax = $request->get('guestmax');
        $room->price = $request->get('price');
        $room->status = 'active';

        if($request->hasFile('file')){
            $image = $request->file('file');
            $filename = time().rand(0,100).'.png';
            $location = public_path('storage/upload/'.$filename);
            Image::make($image)->encode('png')->resize(850,400)->save($location);
            $room->url = $filename;
        }
        $room->save();
        return response()->json($room);
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
        $room = Room::find($id);
        return response()->json($room);
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
        $request->validate([
            'room_name' => 'required',
            'description' => 'required',
            'guestmax' => 'required',
            'price' => 'numeric|required',
            'file' => 'nullable|image|mimes:jpeg,jpg,png|max:1000'
        ]);

        $room = Room::find($id);
        $room->room_name = $request->get('room_name');
        $room->description = $request->get('description');
        $room->GuestMax = $request->get('guestmax');
        $room->price = $request->get('price');
        $room->status = 'active';

        if($request->hasFile('file')){
            $image = $request->file('file');
            $filename = $room->url;
            $location = public_path('storage/upload/'.$filename);
            Image::make($image)->encode('png')->resize(850,400)->save($location);
        }


        $room->save();

        return response()->json($room);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id);
        $file = 'storage/upload/'.$room->url;
        if(File::exists($file)){
            File::delete($file);
        }
        $room->delete();

        return response()->json($room);
    }

    public function showdata(Request $request)
    {
        $rooms = Room::all();
        $response = '';
        foreach ($rooms as $r)
        {
            if($r->status != 'active'){
                $status = '<span class="badge badge-danger">Inactive</span>';
            }else{
                $status = '<span class="badge badge-success">Active</span>';
            }
            $response.='<tr>
            <td>'.$r->room_name.'</td>
            <td>'.$r->description.'</td>
            <td>'.$r->GuestMax.'</td>
            <td>'.$r->price.'</td>
            <td>'.$status.'</td>
            <td><button class="btn btn-primary edit" data-id="'.$r->id.'">View/Edit</button><button class="btn btn-danger delete" data-id="'.$r->id.'">Delete</button></td>
            </tr>';
        }
        return response()->json($response);
    }
}
