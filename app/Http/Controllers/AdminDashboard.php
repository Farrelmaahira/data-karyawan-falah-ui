<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\User;
use App\Notifications\NewUserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class AdminDashboard extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin');
    }
    public function index()
    {
    
        $sections = Section::pluck('name');
        $user = Section::withCount("user")->pluck('user_count');
        $men = User::select(DB::raw('count(*) as count'))->groupBy()->whereRaw("gender = 'men'")->pluck('count');
        $women = User::select(DB::raw('count(*) as count'))->groupBy()->whereRaw("gender = 'women'")->pluck('count');
       
        return view('admin.dashboard', compact('sections', 'user', 'men', 'women', ));
    }
}
    