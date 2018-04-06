<?php

namespace App\Http\Controllers;

use App\Pool;
use Illuminate\Http\Request;
use Image;
use File;

class AdminPoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pool.index');
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
            'pool_name' => 'required',
            'description' => 'required',
            'feet' => 'required',
            'capacity' => 'numeric|required',
            'file' => 'nullable|image|mimes:jpeg,jpg,png|max:1000'
        ]);

        $pool = new Pool;
        $pool->pool_name = $request->get('pool_name');
        $pool->description = $request->get('description');
        $pool->feet = $request->get('feet');
        $pool->capacity = $request->get('capacity');
        $pool->status = 'active';

        if($request->hasFile('file')){
            $image = $request->file('file');
            $filename = time().rand(0,100).'.png';
            $location = public_path('storage/upload/'.$filename);
            Image::make($image)->encode('png')->resize(850,400)->save($location);
            $pool->url = $filename;
        }


        $pool->save();

        return response()->json($pool);
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
        $pool = Pool::find($id);
        return response()->json($pool);
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
            'feet' => 'required',
            'capacity' => 'numeric|required',
            'file' => 'nullable|image|mimes:jpeg,jpg,png|max:1000'
        ]);

        $pool = Pool::find($id);
        $pool->pool_name = $request->get('pool_name');
        $pool->description = $request->get('description');
        $pool->feet = $request->get('feet');
        $pool->capacity = $request->get('capacity');
        $pool->status = 'active';

        if($request->hasFile('file')){
            $image = $request->file('file');
            $filename = $pool->url;
            $location = public_path('storage/upload/'.$filename);
            Image::make($image)->encode('png')->resize(850,400)->save($location);
        }


        $pool->save();

        return response()->json($pool);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pool = Pool::find($id);
        $file = 'storage/upload/'.$pool->url;
        if(File::exists($file)){
            File::delete($file);
        }
        $pool->delete();

        return response()->json($pool);
    }

    public function showdata(Request $request)
    {
        $pools = Pool::all();
        $response = '';
        foreach ($pools as $p)
        {
            if($p->status != 'active'){
                $status = '<span class="badge badge-danger">Inactive</span>';
            }else{
                $status = '<span class="badge badge-success">Active</span>';
            }
            $response.='<tr>
            <td>'.$p->pool_name.'</td>
            <td>'.$p->description.'</td>
            <td>'.$p->feet.'</td>
            <td>'.$p->capacity.'</td>
            <td>'.$status.'</td>
            <td><button class="btn btn-primary edit" data-id="'.$p->id.'">View/Edit</button><button class="btn btn-danger delete" data-id="'.$p->id.'">Delete</button></td>
            </tr>';
        }
        return response()->json($response);
    }
}
