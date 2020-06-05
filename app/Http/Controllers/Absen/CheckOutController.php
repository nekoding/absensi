<?php

namespace App\Http\Controllers\Absen;

use App\CheckOut;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('absen.checkout');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getIp = Http::get('http://ifconfig.me/');
        $getInfo = Http::get('http://ip-api.com/json/'.$getIp->body().'?fields=32985');
        $data = json_decode($getInfo,true);

        $save = CheckOut::create([
            'user_id' => auth()->id(),
            'check_in_id' => session('check_in_id'),
            'report_link' => $request->report_link,
            'ip_address' => $getIp->body(),
            'country' => $data['country'],
            'state' => $data['regionName'],
            'city' => $data['city'],
            'latitude' => $data['lat'],
            'longitude' => $data['lon']
        ]);
        
        if($save->id)
        {
            $request->session()->flash('status', 'Berhasil check out! Sampai jumpa esok :)');
            $request->session()->forget('check_in_id');
            return redirect('/home');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CheckOut  $checkOut
     * @return \Illuminate\Http\Response
     */
    public function show(CheckOut $checkOut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CheckOut  $checkOut
     * @return \Illuminate\Http\Response
     */
    public function edit(CheckOut $checkOut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CheckOut  $checkOut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CheckOut $checkOut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CheckOut  $checkOut
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckOut $checkOut)
    {
        //
    }
}
