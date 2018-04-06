<?php

namespace App\Http\Controllers;

use App\Cottage;
use Illuminate\Http\Request;
use Image;
use File;

class AdminCottageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cottage.index');
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
            'cottage_name' => 'required',
            'description' => 'required',
            'guestmax' => 'required',
            'price' => 'numeric|required',
            'file' => 'nullable|image|mimes:jpeg,jpg,png|max:1000'
        ]);

        $cottage = new Cottage;
        $cottage->cottage_name = $request->get('cottage_name');
        $cottage->description = $request->get('description');
        $cottage->GuestMax = $request->get('guestmax');
        $cottage->price = $request->get('price');
        $cottage->status = 'active';

        if($request->hasFile('file')){
            $image = $request->file('file');
            $filename = time().rand(0,100).'.png';
            $location = public_path('storage/upload/'.$filename);
            Image::make($image)->encode('png')->resize(850,400)->save($location);
            $cottage->url = $filename;
        }


        $cottage->save();

        return response()->json($cottage);
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
        $cottage = Cottage::find($id);
        return response()->json($cottage);
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
            'cottage_name' => 'required',
            'description' => 'required',
            'guestmax' => 'required',
            'price' => 'numeric|required',
            'file' => 'nullable|image|mimes:jpeg,jpg,png|max:1000'
        ]);

        $cottage = Cottage::find($id);
        $cottage->cottage_name = $request->get('cottage_name');
        $cottage->description = $request->get('description');
        $cottage->GuestMax = $request->get('guestmax');
        $cottage->price = $request->get('price');
        $cottage->status = 'active';

        if($request->hasFile('file')){
            $image = $request->file('file');
            $filename = $cottage->url;
            $location = public_path('storage/upload/'.$filename);
            Image::make($image)->encode('png')->resize(850,400)->save($location);
        }


        $cottage->save();

        return response()->json($cottage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cottage = Cottage::find($id);
        $file = 'storage/upload/'.$cottage->url;
        if(File::exists($file)){
            File::delete($file);
        }
        $cottage->delete();

        return response()->json($cottage);
    }

    public function showdata(Request $request)
    {
        $cottages = Cottage::all();
        $response = '';
        foreach ($cottages as $c)
        {
            if($c->status != 'active'){
                $status = '<span class="badge badge-danger">Inactive</span>';
            }else{
                $status = '<span class="badge badge-success">Active</span>';
            }
            $response.='<tr>
            <td>'.$c->cottage_name.'</td>
            <td>'.$c->description.'</td>
            <td>'.$c->GuestMax.'</td>
            <td>'.$c->price.'</td>
            <td>'.$status.'</td>
            <td><button class="btn btn-primary edit" data-id="'.$c->id.'">View/Edit</button><button class="btn btn-danger delete" data-id="'.$c->id.'">Delete</button></td>
            </tr>';
        }
        return response()->json($response);
    }
}
