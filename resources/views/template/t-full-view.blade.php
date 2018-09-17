@inject('Helper', 'App\HelperClass')
@extends('layouts.usertemplate')
@section('content')
    <div class="mt-16 flex justify-center">
        <div class="w-1/2">
            <!-- yes oh here start loop -->
            @if($trending->count() >= 0)
                <div class="col-md-6 center-block">
                    <p> Total user : {{$trending->count()}} </p>
                </div>
                @foreach($trending as $trend)
                    <div class="col-md-10 col-lg-10">
                        <div class="media-left">
                            <div class="figure-block">
                                <figure class="item-thumb">
                                    <a href="{{ url('/') }}" title="The user name and the page this posted">
                                        @if(!empty($Helper->userimage($trend->id)->name))
                                            <img src="{{asset("images/user/".$Helper->userimage($trend->id)->name)}}" class="img-circle imgcircle" alt="thumb">
                                        @else
                                            <img src='{{asset("images/avatar/avatar.png")}}' class="img-circle imgcircle" alt="thumb">
                                        @endif
                                        <span class=""><span>{{$trend->name}}</span> /<span style="color:#FF8C00;">{{$trend->user_name}} </span>
                                    </a>
                                </figure>
                            </div>
                        </div>

                    </div>
                    <div class="container-user col-md-10 col-lg-12">
                        <p style="font-size:1.4em; text-align:justify; color:#000;">
                            @if(!empty($trend->description))
                                {{$trend->description}}
                            @endif
                        </p>
                        <a href="{{url('/block-user/'.$trend->id)}}"> <i title="Block the user" class="trash glyphicon glyphicon-trash "> </i> </a>
                        <a href="{{url('/edit-user/'.$trend->id)}}"> <i title="Edit this user" class="edit glyphicon glyphicon-edit "> </i> </a>
                        <span class="time-right">{{date('d F \'y \a\t h:i', strtotime($trend->created_at))}}</span>
                    </div>
                    <!---yes stop loop here  -->
                @endforeach
            @else
                <div class="center-block col-md-4">
                    <p>
                        No user yet
                    </p></div>
            @endif
        </div>
    </div>
@endsection