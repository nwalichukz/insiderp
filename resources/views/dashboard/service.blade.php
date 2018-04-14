<!--
/**
 * Created by PhpStorm.
 * User: emeka
 * Date: 3/7/18
 * Time: 11:42 PM
 */ -->
@extends('layouts.app')
@section('title')
    Service | Bido
@endsection

@section('content')

    @include('partials.header2')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    @include('partials.sidebar')
                </div>
                 @if ($message = Session::get('status'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="col-md-8 col-sm-8 col-xs-12">

                    <form action="{{ route('addService') }}" method="post" class="form-ad" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="divider"><h3>Basic information</h3></div>
                        <div class="form-group">
                            <label class="control-label" for="service_name">Service Name</label>
                            <input type="text" name="service_name" name="service_name" class="form-control" placeholder="Service Name (e.g. Axenic Arts)" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="profession_title">Profession Title</label>
                            <input type="text" name="profession_title" class="form-control" placeholder="Headline (e.g. Graphic Designer)" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="location">Location</label>
                            <input type="text" name="location" class="form-control" placeholder="Location">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="service_category">Service Category</label>
                            <select name="service_category" class="form-control select">
                                <option value="">Select service category</option>
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
                            <div class="button-group">
                                <div class="action-buttons">
                                    <div class="upload-button">
                                        <button class="btn btn-common">Choose a service logo</button>
                                        <input id="cover_img_file" type="file" name="avatar">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="description">Description</label>
                            <textarea name="description" class="form-control" rows="5" required></textarea>
                        </div>

                        <div class="divider"><h3>Skills</h3></div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label" for="skills">Skill Name</label>
                                    <input class="form-control" name="skills" placeholder="Skill name, e.g. Design" type="text">
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="proficiency">% (1-100)</label>
                                    <input class="form-control"name="proficiency" placeholder="Skill proficiency, e.g. 90" type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="divider">
                            <h3>Features</h3>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="additional_service">Featured services</label>
                            <input class="form-control" name="additional_service" placeholder="Feature name, e.g. Home Service" type="text">
                        </div>
                        <input type="submit"class="btn btn-common" value="Add Service">
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection