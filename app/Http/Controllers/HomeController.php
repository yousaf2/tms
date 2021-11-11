<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){

        return view('admin/dashboard');
    }
    public function team_lead_dashboard(){

        return view('team_manager/dashboard');
    }
    public function team_member_dashboard(){

        echo 'yes';die;
        return view('team_member/dashboard');
    }
}
