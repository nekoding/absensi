<?php

namespace App\Http\Controllers\Admin;

use App\CheckIn;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckInController extends Controller
{
    public function index()
    {
        return view('admin.checkin');
    }

    public function show()
    {
        $data = CheckIn::orderBy('check_in.created_at','DESC')
                        ->whereDate('check_in.created_at',date('Y-m-d'))
                        ->join('users', 'check_in.user_id','=','users.id')
                        ->select(['ip_address','check_in.created_at','name','state','city'])
                        ->get();

        return datatables($data)->editColumn('created_at', function(CheckIn $checkin){
            return $checkin->created_at->diffForHumans();
        })->toJson();
        
    }
}
