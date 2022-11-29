<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class SuperadminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $section = Section::select()->get();
        return view('superadmin.profile', compact('section'));
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
        $this->validate($request, [
            'first' => 'required',
            'last' => 'required',
            'username' => 'required',
            'email' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'section' => 'required',
        ]);
        $user = User::findOrFail($id);
        if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image->storeAs('public/img', $image->hashName());
                $user->update([
                    'first' => $request->first,
                    'last' => $request->last,
                    'image'     => $image->hashName(),
                    'username' => $request->username,
                    'email' => $request->email,
                    'sections_id' => $request->section,
                ]);
         
        } else {
                $user->update([
                    'first' => $request->first,
                    'last' => $request->last,
                    'username' => $request->username,
                    'email' => $request->email,
                    'sections_id' => $request->section,
                ]);  
            }
            return redirect()->route('superadmin.index');
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

    public function getData(Request $request)
    {
        $data = User::find($request->id);
        return $data;
    }
}
