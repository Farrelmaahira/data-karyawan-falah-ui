<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SuperadminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $section = Section::select()->get();
        $role = Role::select()->get();
        $users = User::role(['admin', 'user'])->get();
        $no = 1;
        return view('superadmin.user', compact('users', 'no', 'section', 'role'));
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
        $this->validate($request, [
            'first' => 'required',
            'last' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'section' => 'required',
            'role' => 'required',
            'gender' => 'required'
        ]);

        $user = User::create([
            'first' => $request->first,
            'last' => $request->last,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'sections_id' => $request->section,
            'gender' => $request->gender
        ]);
        $user->assignRole($request->role);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->get();
        return view('superadmin.userProfile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('superadmin.modal.edit')->with([
            'data' => $data
        ]);
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
            'username' => 'required|max:15',
            'email' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'section' => 'required',
            'role' => 'nullable'
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
                if($request->has('role')){
                    $user->syncRoles($request->role);
                }
         
        } else {
                $user->update([
                    'first' => $request->first,
                    'last' => $request->last,
                    'username' => $request->username,
                    'email' => $request->email,
                    'sections_id' => $request->section,
                ]);
                if($request->has('role')){
                    $user->syncRoles($request->role);
                };               
            }
            return redirect()->route('users.index');
        }

      

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('users.index');
    }   

    public function getData(Request $request)
    {
        $data = User::find($request->id);
        return $data;
    }
}
