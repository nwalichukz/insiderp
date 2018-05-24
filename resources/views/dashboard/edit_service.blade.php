@extends('layouts.app')
@section('title')
    {{ ucfirst($service->name) }} | Bido
@endsection

@section('content')
    @include('partials.header2')

    <div id="content">
        <div class="container">
            <h3>Edit {{ $service->name }}</h3>
            <hr>
            <div class="row">
                <!-- left column 
                <div class="col-md-3">
                    <div class="text-center">
                        <form action="{{ route('updateLogo') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @if(!empty($service->logo->logo))
                            <img src='{{ asset("images/user/".$service->logo->logo) }}' class="avatar img-circle img-responsive" alt="logo">
                            @else
                            <img src="{{ asset('images/images.jpeg') }}" class="avatar img-circle img-responsive" alt="logo">
                            @endif
                            <h6>Change logo...</h6>
                            <input type="hidden" name="id" value="{{$service->id}}">
                            <input type="file" class="btn btn-default" name="avatar" required>
                            <button type="submit" class="btn btn-common">Save</button>
                        </form>
                    </div>
                </div> -->

                <!-- edit form column -->
                <div class="col-md-9 personal-info">
                    <form class="form-horizontal" role="form" action="{{ route('updateService') }}" method="post">
                        {{ csrf_field() }}
                        <div class="divider"><h3>Basic information</h3></div>
                        <div class="form-group">

                            <label class="control-label" for="textarea">Service Name</label>
                            <input type="text" name="service_name" name="service_name" class="form-control" placeholder="Service Name (e.g. Axenic Arts)" value="{{ $service->name }}">
                            <input type="hidden" name="id" value="{{$service->id}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Profession Title</label>
                            <input type="text" name="profession_title" class="form-control" placeholder="Headline (e.g. Graphic Designer)" value="{{ $service->profession_title }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Location</label>
                            <input type="text" name="location" class="form-control" placeholder="Location" value="{{ $service->location }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="select2">Service Category</label>
                            <select name="service_category" class="form-control select">
                                <option value="{{$service->service_category}}">{{$service->service_category}}</option>
                                @foreach ($category as $name)
                                <option value="{{$name->name}}">{{$name->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Description</label>
                            <textarea name="description" class="form-control" rows="7">{{ $service->description }}</textarea>
                        </div>

                        <div class="divider"><h3>Skills</h3></div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label" for="textarea">Skill Name</label>
                                    <input class="form-control" name="skills" placeholder="Skill name, e.g. Design" value="{{ $service->skills }}" type="text">
                                </div>
                            </div>
                        </div>
                
                        <input type="submit"class="btn btn-common" value="Update Service">
                    </form>
                </div>
            </div>
        </div>
        <hr>
    </div>
@endsection