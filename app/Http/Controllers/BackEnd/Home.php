<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Home extends BackEndController
{
    public function index()
    {
        return view('back-end.home');
    }


}
