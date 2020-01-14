@extends('back-end.layout.app')

@section('title')
    {{$title_page}}
@endsection

@section('content')
    @component('back-end.layout.header')
        @slot('nav_title')
            {{$title_page}}
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title ">{{$title_page}}</h4>
                            <p class="card-category"> {{$pageDes}}</p>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="#pablo" class="btn btn-info btn-round">
                                {{'Add '.$modual_name}}
                            </a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <form action="{{route('users.update',['id'=>$user->id])}}" method="post">
                        @method('put')
                        @include('back-end.users.form')
                        <button type="submit" class="btn btn-primary pull-right">Edit {{$modual_name}}</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

