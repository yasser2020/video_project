@extends('back-end.layout.app')
@php
    $modual_name="Users";
    $title_page="Create ".$modual_name;
    $pageDes="Here you can create users";
@endphp
@section('title')
    {{$title_page}}
@endsection

@section('content')
    @component('back-end.layout.header')
        @slot('nav_title')
            {{$title_page}}
        @endslot
    @endcomponent
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">    {{$title_page}}</h4>
                        <p class="card-category">{{$pageDes}}</p>
                    </div>
                    <div class="card-body">
                        <form action="{{route('users.store')}}" method="post">
                                @include('back-end.users.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

