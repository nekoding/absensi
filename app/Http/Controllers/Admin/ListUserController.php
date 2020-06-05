<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ListUserController extends Controller
{
    public function index()
    {
        return view('admin.listuser');
    }

    public function show()
    {
        $data = User::orderBy('name','ASC')
                    ->get();
        return datatables($data)->toJson();
    }
}
