@inject('Helper', 'App\HelperClass')
@extends('layouts.usertemplate')
@section('content')
    <div class="mt-20 flex justify-center px-3">
        <div class="w-full md:w-2/5">
            <div class="text-center mb-4">Total Users : {{ $total_users }}</div>

            @foreach($users as $user)
                <div class="user bg-white flex items-start justify-between p-4 rounded-lg">
                    <div>
                        <a href="{{ url('/') }}" title="The user name and the page this posted" class="flex items-center">
                            @if(!empty($Helper->userimage($user->id)->name))
                                <img src="{{asset("images/user/".$Helper->userimage($user->id)->name)}}" class="img-circle imgcircle" alt="thumb">
                            @else
                                <img src='{{asset("images/avatar/avatar.png")}}' class="img-circle imgcircle" alt="thumb">
                            @endif
                            <span class="ml-2"><span>{{$user->name}}</span> /<span style="color:#FF8C00;">{{$user->user_name}} </span></span>
                        </a>
                    </div>
                    <div>
                        <p>
                            @if(!empty($trend->description))
                                {{$trend->description}}
                            @endif
                        </p>
                    </div>
                    <div>
                        <div class="mb-6">
                            <span class="time-right">{{date('d F \'y \a\t h:i', strtotime($user->created_at))}}</span>
                        </div>
                        <div class="flex items-center">
                            <div class="mr-3"><a href="{{url('/block-user/'.$user->id)}}"> <i title="Block the user" class="fa fa-recycle "> </i> </a></div>
                            <div class="mr-3"><a href="{{url('/edit-user/'.$user->id)}}"> <i title="Edit this user" class="fa fa-edit"> </i> </a></div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="mt-4 mb-4">{{ $users->links() }}</div>
        </div>
    </div>
@endsection