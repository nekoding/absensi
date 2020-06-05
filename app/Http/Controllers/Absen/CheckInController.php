<?php

namespace App\Http\Controllers\Absen;

use App\CheckIn;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CheckInController extends Controller
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
        return view('absen.checkin');
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

        $check_in = CheckIn::create([
            'user_id' => auth()->id(),
            'ip_address' => $getIp->body(),
            'country' => $data['country'],
            'state' => $data['regionName'],
            'city' => $data['city'],
            'latitude' => $data['lat'],
            'longitude' => $data['lon']
        ]);
        
        if($check_in->id)
        {
            $request->session()->flash('status', 'Berhasil check in!');
            $request->session()->put('check_in_id', $check_in->id);
            return redirect('/home');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CheckIn  $checkIn
     * @return \Illuminate\Http\Response
     */
    public function show(CheckIn $checkIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CheckIn  $checkIn
     * @return \Illuminate\Http\Response
     */
    public function edit(CheckIn $checkIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CheckIn  $checkIn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CheckIn $checkIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CheckIn  $checkIn
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckIn $checkIn)
    {
        //
    }
}
