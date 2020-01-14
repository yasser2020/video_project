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
        $modual_name=$this->pluralClassName();
        $smodual_name=$this->getModelName();
        $title_page=$modual_name." Controller";
        $pageDes="Here you can edit - update -delete".$modual_name;
        $users=$this->model;
        $users=$this->filter($users)->paginate(10);
        return view('back-end.'.$this->getClassNameFromModel().'.index',compact('users','modual_name','title_page','pageDes','smodual_name'));
    }

    public function create()
    {
        $modual_name=$this->getModelName();
        $title_page=$modual_name." Controller";
        $pageDes="Here you can edit - update -delete ".$this->getModelName();
        return view('back-end.'.$this->getClassNameFromModel().'.create',compact('modual_name','title_page','pageDes'));
    }

    public function edit($id)
    {
        $modual_name=$this->getModelName();
        $title_page=$modual_name." Controller";
        $pageDes="Here you can edit ".$modual_name;
        $user=$this->model->findOrFail($id);
        return view('back-end.'.$this->getClassNameFromModel().'.edit',compact('user','modual_name','title_page','pageDes'));
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
        return strtolower($this->pluralClassName());
    }

    protected function pluralClassName()
    {
        return str_plural(($this->getModelName()));
    }
    protected function getModelName()
    {
        return class_basename($this->model);
    }
}
?>