<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\client;

class AuthorizationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

}
