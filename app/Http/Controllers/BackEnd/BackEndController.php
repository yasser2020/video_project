<?php
namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BackEndController extends Controller{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model=$model;
    }

    public function index()
    {
        $users=$this->model;
        $users=$this->filter($users)->paginate(10);
        return view('back-end.'.$this->getClassNameFromModel().'.index',compact('users'));
    }

    public function create()
    {
        return view('back-end.'.$this->getClassNameFromModel().'.create');
    }

    public function edit($id)
    {
        $user=$this->model->findOrFail($id);
        return view('back-end.'.$this->getClassNameFromModel().'.edit',compact('user'));
    }


    public function destroy($id)
    {
        $this->model->findOrFail($id)->delete();

        return redirect()->route($this->getClassNameFromModel().'.index');
    }
    protected function filter($rows)
    {
        return $rows;
    }

    protected function getClassNameFromModel()
    {
        return str_plural(strtolower(class_basename($this->model)));
    }
}
?>