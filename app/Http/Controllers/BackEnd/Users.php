<?php

namespace App\Http\Controllers\BackEnd;



use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class Users extends BackEndController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }



    public function create()
    {
     return view('back-end.users.create');
    }
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('users.index');
    }
    public function edit($id)
    {
        $user=User::findOrFail($id);
        return view('back-end.users.edit',compact('user'));
    }
    public function update($id,Request $request)
    {
        $user=User::findOrFail($id);
        $request_data=[
            'name'=>$request->name,
            'email'=>$request->email
        ];
        if(request()->has('password') && $request->get('password')!="")
        {
           $request_data['password']->$request->password;
        }
        $user->update($request_data);
    }
    public function destroy($id)
    {
          $user=User::findOrFail($id);
          $user->delete();
          return redirect()->route('users.index');
    }
}
