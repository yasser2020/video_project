<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Requests\BackEnd\Users\Store;
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

    public function store(Store $request)
    {
        $request_data=$request->all();
        $request_data['password']= Hash::make($request_data['password']);
        $this->model->create($request_data);
        return redirect()->route('users.index');
    }

    public function update($id,Request $request)
    {
        $this->model->findOrFail($id);
        $request_data=$request->all();
        if(isset($request_data['password'])&& isset($request_data['password'])!="")
        {
            $request_data['password']= Hash::make($request_data['password']);
        }
        else
        {
            unset($request_data['password']);
        }
        $this->model->update($request_data);
        return redirect()->route('users.index');
    }

}
