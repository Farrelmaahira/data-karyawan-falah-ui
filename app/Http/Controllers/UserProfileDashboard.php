<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserProfileDashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.profile');
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
        $data = [
            'user' => User::find($id),
            'section' => Section::select()->get()
        ];

        return view('user.edit')->with($data);
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
    
        $this->validate($request, [
            'first' => 'required',
            'last' => 'required',
            'username' => 'required',
            'email' => 'required',
            'section' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/img', $image->hashName());
            //update post with new image
            User::where('id', $id)->update([
                'first' => $request->first,
                'last' => $request->last,
                'image'     => $image->hashName(),
                'username' => $request->username,
                'email' => $request->email,
                'sections_id' => $request->section,
            ]);
        } else {
            //update post without image
            User::where('id', $id)->update([
                'first' => $request->first,
                'last' => $request->last,
                'username' => $request->username,
                'email' => $request->email,
                'sections_id' => $request->section,
            ]);
        }

        //redirect to index
        return redirect()->route('profile.index')->with(['success' => 'Data Berhasil Diubah!']);
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
