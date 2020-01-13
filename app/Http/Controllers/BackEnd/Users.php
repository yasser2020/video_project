<?php

namespace App\Http\Controllers\BackEnd;



use App\Models\User;

class Users extends BackEndController
{
    public function index()
    {
        $users=User::paginate(10);
        return view('back-end.users.index',compact('users'));
    }
}
