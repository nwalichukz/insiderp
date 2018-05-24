@extends('layouts.app')
@section('title')
    Upload logo | Bido
@endsection
@section('content')
    @include('partials.header2')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">
                    <h3 class="alerts-title">Add-Edit a logo</h3>
                    <hr>
                    <form action="{{ route('updateAvatar') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @if(!empty($user->avater->avater))
                                <a href="{{ asset("images/user/". $user->avater->avater) }}" class="swipebox" title="Profile Photo">
                                    <img src='{{ asset("images/user/". $user->avater->avater) }}' class="avatar img-responsive img-raised img-thumbnail" alt="avatar">
                                </a>
                                @else
                                 <img src='{{ asset("images/logo/avatar.jpg") }}' class="avatar img-responsive img-raised img-thumbnail" alt="avatar">
                            @endif
                            <br>
                            <h6>Upload a service logo or ur image</h6>

                            <input type="file" class="btn btn-default" name="avatar" onchange="readURL(this);" id="images" required>
                            <div id="image-holder" class="col-md-12"></div>
                            <img class="showimg" src="#" alt="" /> 
                             @if(!empty($user->avater->avater))
                            <button type="submit" class="btn btn-common">Change</button>
                            @else
                            <button type="submit" class="btn btn-common">Upload</button>
                            @endif
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection