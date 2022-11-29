<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserDashboard extends Controller
{

    public function __construct()
    {
        $this->middleware('role:user');
    }
    public function index()
    {
        $sections = Section::pluck('name');
        $user = Section::withCount("user")->pluck('user_count');
        $men = User::select(DB::raw('count(*) as count'))->groupBy()->whereRaw("gender = 'men'")->pluck('count');
        $women = User::select(DB::raw('count(*) as count'))->groupBy()->whereRaw("gender = 'women'")->pluck('count');
       
        return view('user.dashboard', compact('sections', 'user', 'men', 'women'));
    }
    public function profile()
    {
        return view('user.profile');
    }
}
