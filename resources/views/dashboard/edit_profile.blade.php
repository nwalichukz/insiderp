@extends('layouts.app')
@section('title')
    Edit Profile | Bido
@endsection
@section('content')
    @include('partials.header2')

    <div id="content">
        <div class="container">
            <h1>Edit Profile</h1>
            <hr>
            <div class="row">
                <!-- left column -->
                <div class="col-md-3">
                    <div class="text-center">
                        <form action="{{ route('updateAvatar') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <img src="{{ asset('images/images.jpeg') }}" class="avatar img-circle img-responsive" alt="avatar">
                            <h6>Upload a different photo...</h6>

                            <input type="file" class="btn btn-default" name="avatar" required>
                            <button type="submit" class="btn btn-common">Save</button>
                        </form>
                    </div>
                </div>

                <!-- edit form column -->
                <div class="col-md-9 personal-info">
                    <h3>Personal info</h3>

                    <form class="form-horizontal" role="form" action="{{ route('updateProfile') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Full Name:</label>
                            <div class="col-lg-8">
                                <input name="name" class="form-control" type="text" value="{{ ucfirst($user->name) }}" placeholder="Full Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Location:</label>
                            <div class="col-md-8">
                                <input name="location" class="form-control" type="text" value="{{ $user->location }}" placeholder="Your Location">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Website:</label>
                            <div class="col-md-8">
                                <input name="website" class="form-control" type="url" value="{{ $user->website }}" placeholder="Website">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Facebook:</label>
                            <div class="col-lg-8">
                                <input name="facebook" class="form-control" type="text" value="{{ $user->facebook }}" placeholder="Facebook Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Twitter:</label>
                            <div class="col-lg-8">
                                <input name="twitter" class="form-control" type="text" value="{{ $user->twitter }}" placeholder="Twitter Handle">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Instagram:</label>
                            <div class="col-lg-8">
                                <input name="instagram" class="form-control" type="text" value="{{ $user->instagram }}" placeholder="Instagram Handle">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Youtube:</label>
                            <div class="col-md-8">
                                <input name="youtube" class="form-control" type="text" value="{{ $user->youtube }}" placeholder="Youtube Channel">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-common" value="Save Changes">
                                <span></span>
                                <input type="reset" class="btn btn-default" value="Cancel">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
    </div>
@endsection