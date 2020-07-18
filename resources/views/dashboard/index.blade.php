@inject('Helper', 'App\HelperClass')
@extends('layouts.usertemplate')
@section('content')

<div class="mt-16 px-3">
    <div class="sm:flex sm:items-start">
        <div class="w-full md:w-1/4 lg:w-1/4 mb-3">
            <div class="bg-white py-3 px-4 shadow rounded">
                <ul class="list-reset">
                    <li class="text-sm mb-2">  <a href="{{url(Auth::user()->user_level.'/'.str_replace(' ', '-', strtolower(Auth::user()->name)))}}">Trending </a> </li>
                    <li class="text-sm mb-2">  <a href="#" data-toggle="modal" data-target="#addPostStoryModal" data-placement="top" title="share a story"><button style="background:#F8F8FF; color:#000; border-radius:7px;">Share story</button></a> </li>
                    
                    
                    <li class="text-sm mb-2"> <a href="#" data-toggle="modal" data-target="#changePasswordModal" data-placement="top" title="change your password">change password </a></li>
                   
                    <li class="text-sm mb-2">   <a href="#" data-toggle="modal" data-target="#editProfileModal" data-placement="top" title="Edit your profile">Edit Profile</a></li>
                    <li class="text-sm mb-2">   <a href="#" data-toggle="modal" data-target="#addUserImageModal" data-placement="top" title="Edit your profile">Add Profile Image</a></li>
                    @if(Auth::check())
                        @if(Auth::user()->user_level==='admin' || Auth::user()->user_level==='editor')
                        <li class="text-sm mb-2"> <a href="{{url('/get-add-post')}}" data-toggle="modal" data-target="#changePasswordModal" data-placement="top" title="change your password">Add Post </a></li>
                            <li class="text-sm mb-2"> <a href="{{url('/blocked-posts')}}">View blocked posts</a> </li>
                            @if(Auth::user()->user_level==='admin')
                                <li class="text-sm mb-2"> <a href="{{url('/view-users')}}">View users</a> </li>
                                <li class="text-sm mb-2"> <a href="{{url('/view-votes')}}">View votes</a> </li>
                                <li class="text-sm mb-2"> <a href="{{url('/view-blocked-users')}}">View blocked users</a> </li>
                                <li class="text-sm mb-2"> <a href="{{url(str_replace(' ', '-', strtolower(Auth::user()->name)).'/my-post/'.Auth::user()->id)}}" title="view all post by me">My Posts </a></li>
                                <li class="text-sm mb-2"> <a href="#" data-toggle="modal" data-target="#inviteFriendModal" data-placement="top" title="invite a friend to join Bido">Invite a friend </a></li>
                            @endif
                            <li class="text-sm mb-2">
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif
                    @endif

                </ul>
            </div>
        </div>
        <div class="w-full md:w-2/5 md:mx-4">
            @include('partials.search-bar')
            @if($posts->count() > 0)
                @include('partials.post-item')
            @endif

        </div>
    </div>
</div>
@endsection