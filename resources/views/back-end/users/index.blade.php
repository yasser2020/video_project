@extends('back-end.layout.app')
@php
$modual_name="Users";
$title_page=$modual_name." Controller";
$pageDes="Here you can edit - update -delete users";
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
                            <a href="{{route('users.create')}}" class="btn btn-info btn-round">
                                {{'Add '.$modual_name}}
                            </a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <tr><th>
                                    ID
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th  class="text-right">
                                    Control
                                </th>

                            </tr></thead>
                            <tbody>
                            @foreach($users as $user)
                               <tr>
                                   <td>
                                       {{$user->id}}
                                   </td>

                                   <td>
                                       {{$user->name}}
                                   </td>
                                   <td>
                                       {{$user->email}}
                                   </td>
                                   <td class="text-right">
                                       {{-- Edit Button --}}
                                       <div class="row col-md-8 float-right">
                                       <div class="col-md-4">
                                       <a href="{{route('users.edit',['id'=>$user->id])}}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit {{$modual_name}}">
                                           <i class="material-icons">edit</i>
                                       </a>
                                       </div>
                                       <div class="col-md-4">
                                            {{--  form for delete button--}}
                                       <form action="{{route('users.destroy',['id'=>$user->id])}}" method="post">
                                           @csrf
                                           @method('delete')
                                       <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove {{$modual_name}} ">
                                           <i class="material-icons">close</i>
                                       </button>
                                       </form>
                                       </div>
                                       </div>
                                   </td>
                               </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

