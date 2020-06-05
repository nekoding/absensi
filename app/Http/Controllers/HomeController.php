<?php

namespace App\Http\Controllers;

use App\CheckIn;
use App\CheckOut;
use App\User;
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
    public function index()
    {
        $data = CheckIn::where('check_in.user_id',auth()->id())
            ->orderBy('check_in.created_at','desc')
            ->join('check_out','check_in.id','=','check_out.check_in_id')
            ->paginate(10, array('check_in.created_at as check_in','check_in.state as checkIn_state','check_out.created_at as check_out','check_out.state as checkOut_state','report_link'));
        return view('home',compact('data'));
    }
}
