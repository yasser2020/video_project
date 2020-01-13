<?php
namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class BackEndController extends Controller{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model=$model;
    }

    public function index()
    {

        $users=$this->model->paginate(10);
        return view('back-end.'.$this->getClassNameFromModel().'.index',compact('users'));
    }
    protected function getClassNameFromModel()
    {
        return str_plural(strtolower(class_basename($this->model)));
    }
}
?>