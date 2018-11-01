 @inject('Helper', 'App\HelperClass')
@extends('layouts.usertemplate')
@section('content')

    <div class="mt-16 flex justify-center px-3">
    <div class="w-full md:w-2/5 bg-white rounded">
        <div class="mb-2 border-b text-black capitalize text-xl py-3 px-4">Edit Profile</div>
        <div class="px-4">
               <form action="{{url('/update-profile')}}" method="post" enctype="multipart/form-data" id="editprofile">
                    {{ csrf_field() }}
                    <div class="mb-3">
                    <input type="text" name="editname" class="modal-input" value="@if(!empty(Auth::check())){{Auth::user()->name}}@endif">
                     <input type="hidden" name="id" value="@if(!empty(Auth::check())){{Auth::user()->id}}@endif">
                </div>
                <div class="mb-3">
                    <input type="text" name="email" class="modal-input" value="@if(!empty(Auth::check())){{Auth::user()->email}}@endif" >
                </div>
                <div class="mb-3">
                    <input type="text" name="user_name" class="modal-input" value="@if(!empty(Auth::check())){{Auth::user()->user_name}}@endif" >
                </div>
                @if(Auth::check())
                 @if(Auth::user()->user_level === 'editor' || Auth::user()->user_level === 'admin')
                    <div class="mb-3">
                    <textarea name="description" class="modal-input" rows="2">{{Auth::user()->description}} </textarea>
                </div>
                @endif
                @endif

            @if(Auth::check())
             @if(Auth::user()->user_level === 'admin')
                    <div class="mb-3">
                    <select name="category" class="modal-select">
                        <option value="{{Auth::user()->user_level}}">{{Auth::user()->user_level}}</option>
                        <option value="user" >User</option>
                        <option value="editor" >Editor</option>
                        <option value="suspended" >suspend</option>
                        <option value="admin" >Admin</option>
                        <option value="banned" >Banned</option>                        
                    </select>
                </div>
                @endif
                @endif
                <div class="modal-footer">
                    <button type="submit" class="modal-button">Update</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    @endsection