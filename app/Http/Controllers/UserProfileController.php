<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('user.profile.index',['user' => $user]);
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
        switch ($request->key) {
            case 'password':
                $request->validate([
                    'password' => 'required|string|between:6,20|confirmed'
                ]);

                $user = User::find(Auth::user()->id);
                $user->password = Hash::make($request->password);
                $user->update();

                return response()->json([
                    'status' => 'password',
                    'title' => 'SUCCESS!',
                    'message' => 'Password Successfully Changed!'
                ]);

                break;

            default:
                $user = User::find(Auth::user()->id);

                $request->validate([
                    'name' => 'required|string',
                    'email' => 'required|unique:users,email,'.$user->id.'\'',
                    'phone' => 'required|unique:users,contact,'.$user->id.'\''
                ]);

                $user->name = $request->name;
                $user->email = $request->email;
                $user->contact = $request->phone;
                $user->update();

                $message = array(
                    'title' => 'SUCCESS!',
                    'message' => 'User Info Successfully Changed!');
                return response()->json([
                    'user' => $user,
                    'message' => $message

                ]);

                break;
        }
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
