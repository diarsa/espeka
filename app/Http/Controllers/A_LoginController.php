<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


class A_LoginController extends Controller
{

    public function index()
    {
        return view('admin.auth.login');
    }

 
}
