@inject('Helper', 'App\HelperClass')
@extends('layouts.usertemplate')
@section('content')
    <div class="mt-14 flex justify-center">
        <div class="w-2/5 bg-white rounded">
            <div class="mb-2 border-b text-black capitalize text-xl py-3 px-4">{{ $user->name }}</div>
            <div class="px-4">
                <form action="{{url('/update-profile')}}" method="post" enctype="multipart/form-data" id="editprofile">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <input type="text" name="editname" class="form-control" value="{{$user->name}}" disabled>
                        <input type="hidden" name="id" class="modal-input" value="{{$user->id}}">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="email" class="modal-input" value="{{$user->email}}">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="user_name" class="modal-input" value="{{$user->user_name}}" disabled>
                    </div>
                    @if(Auth::check())
                        @if(Auth::user()->user_level === 'editor' || Auth::user()->user_level === 'admin')
                            <div class="mb-3">
                                <textarea name="description" class="modal-input" rows="2" disabled>{{$user->description}} </textarea>
                            </div>
                        @endif
                    @endif

                    @if(Auth::check())
                        @if(Auth::user()->user_level === 'admin')
                            <div class="mb-3">
                                <select name="user_level" class="modal-select">
                                    <option value="{{$user->user_level}}">{{$user->user_level}}</option>
                                    <option value="user" >User</option>
                                    <option value="editor" >Editor</option>
                                    <option value="suspended">suspend</option>
                                    <option value="admin" >Admin</option>
                                    <option value="banned" >Banned</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <select name="status" class="modal-select">
                                    <option value="{{$user->status}}">{{$user->status}}</option>
                                    <option value="active" >Active</option>
                                    <option value="suspended" >suspend</option>
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