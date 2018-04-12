@extends('layouts.app')
@section('title')
    {{ ucfirst($service->name) }} | Bido
@endsection

@section('content')
    @include('partials.header2')

    <div id="content">
        <div class="container">
            <h1>Edit {{ $service->name }}</h1>
            <hr>
            <div class="row">
                <!-- left column -->
                <div class="col-md-3">
                    <div class="text-center">
                        <form action="{{ route('updateLogo') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <img src="{{ asset('images/images.jpeg') }}" class="avatar img-circle img-responsive" alt="avatar">
                            <h6>Change logo...</h6>

                            <input type="file" class="btn btn-default" name="avatar" required>
                            <button type="submit" class="btn btn-common">Save</button>
                        </form>
                    </div>
                </div>

                <!-- edit form column -->
                <div class="col-md-9 personal-info">
                    <form class="form-horizontal" role="form" action="" method="post">
                        {{ csrf_field() }}
                        <div class="divider"><h3>Basic information</h3></div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Service Name</label>
                            <input type="text" name="service_name" name="service_name" class="form-control" placeholder="Service Name (e.g. Axenic Arts)" value="{{ $service->name }}">
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
                                <option>Entertainment</option>
                                <option>Business</option>
                                <option>Education and Training</option>
                                <option>Art and Design</option>
                                <option>Events and Lifestyle</option>
                                <option>Programming and IT</option>
                                <option>Sewing and Makeups</option>
                                <option>Repairs</option>
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
                                <div class="col-md-6">
                                    <label class="control-label" for="textarea">% (1-100)</label>
                                    <input class="form-control"name="proficiency" placeholder="Skill proficiency, e.g. 90" value="{{ $service->proficiency }}" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="divider">
                            <h3>Features</h3>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Featured services</label>
                            <input class="form-control" name="additional_service" placeholder="Feature name, e.g. Home Service" value="{{ $service->additional_service }}" type="text">
                        </div>
                        <input type="submit"class="btn btn-common" value="Add Service">
                    </form>
                </div>
            </div>
        </div>
        <hr>
    </div>
@endsection