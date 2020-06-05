<?php

namespace App\Http\Controllers\Admin;

use App\CheckOut;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function index()
    {
        return view('admin.checkout');
    }

    public function show()
    {
        $data = CheckOut::orderBy('check_out.created_at','DESC')
                        ->whereDate('check_out.created_at',date('Y-m-d'))
                        ->join('users', 'check_out.user_id','=','users.id')
                        ->select(['ip_address','check_out.created_at','name','state','city','report_link'])
                        ->get();

        return datatables($data)->editColumn('created_at', function(CheckOut $checkin){
            return $checkin->created_at->diffForHumans();
        })->toJson();
        
    }
}
