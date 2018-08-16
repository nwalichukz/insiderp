@inject('Helper', 'App\HelperClass')
@extends('layouts.usertemplate')
@section('content')
<div class="col-md-6 col-lg-6" id="centerDiv">
<div class="" tabindex="" role="dialog" aria-labelledby="">
        <div class="modal-dialog">
            <div class="modal-content" style="padding:10px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"></button>
                    <h3 class="modal-title" id="lineModalLabel">Edit : {{$user->name}} details</h3>
                </div>
                <form action="{{url('/update-profile')}}" method="post" enctype="multipart/form-data" id="editprofile">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <input type="text" name="editname" class="form-control" value="{{$user->name}}" disabled>
                     <input type="hidden" name="id" class="form-control" value="{{$user->id}}">
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" value="{{$user->email}}" disabled>
                </div>
                <div class="form-group">
                    <input type="text" name="user_name" class="form-control" value="{{$user->user_name}}" disabled>
                </div>
                @if(Auth::check())
                 @if(Auth::user()->user_level === 'editor' || Auth::user()->user_level === 'admin')
                    <div class="form-group">
                    <textarea name="description" class="form-control" rows="2" disabled>{{$user->description}} </textarea>
                </div>
                @endif
                @endif

            @if(Auth::check())
             @if(Auth::user()->user_level === 'admin')
                    <div class="form-group">
                    <select name="user_level" class="form-control">
                        <option value="{{$user->user_level}}">{{$user->user_level}}</option>
                        <option value="user" >User</option>
                        <option value="editor" >Editor</option>
                        <option value="suspended">suspend</option>
                        <option value="admin" >Admin</option>
                        <option value="banned" >Banned</option>                        
                    </select>
                </div>
                  <div class="form-group">
                    <select name="status" class="form-control">
                        <option value="{{$user->status}}">{{$user->status}}</option>
                        <option value="active" >Active</option>
                        <option value="suspended" >suspend</option>
                        <option value="banned" >Banned</option>                        
                    </select>
                </div>
                @endif
                @endif
                <div class="modal-footer">
                    <button type="submit" class="pull-left btn btn-common">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection