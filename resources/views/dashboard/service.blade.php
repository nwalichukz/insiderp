<!--
/**
 * Created by PhpStorm.
 * User: emeka
 * Date: 3/7/18
 * Time: 11:42 PM
 */ -->
@extends('layouts.app')
@section('title')
    Job Offers | Biddo
@endsection

@section('content')

    @include('partials.header2')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    @include('partials.sidebar')
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">

                    <form class="form-ad">
                        <div class="divider"><h3>Basic information</h3></div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Service Name</label>
                            <input type="text" name="service_name" class="form-control" placeholder="Service Name">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea"></label>
                            <label class="control-label" for="textarea">Email</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Profession Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Headline (e.g. Front-end developer)">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Location</label>
                            <input type="text" class="form-control" placeholder="Location, e.g">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Web</label>
                            <input type="text" class="form-control" placeholder="Website address">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Pre Hour</label>
                            <input type="text" class="form-control" placeholder="Bill, e.g. 85">
                        </div>
                        <div class="form-group">
                            <div class="button-group">
                                <div class="action-buttons">
                                    <div class="upload-button">
                                        <button class="btn btn-common">Choose a service logo</button>
                                        <input id="cover_img_file" type="file">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="textarea">Description</label>
                            <textarea name="description" class="form-control" rows="7"></textarea>
                        </div>

                        <div class="divider"><h3>Skills</h3></div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label" for="textarea">Skill Name</label>
                                    <input class="form-control" name="skills[]" placeholder="Skill name, e.g. HTML" type="text">
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="textarea">% (1-100)</label>
                                    <input class="form-control"name="perfection" placeholder="Skill proficiency, e.g. 90" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="divider">
                            <h3>Features</h3>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Featured services</label>
                            <input class="form-control" name="features[]" placeholder="Feature name, e.g. Home Service" type="text">
                        </div>
                        <input type="submit"class="btn btn-common" value="Add Service">
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection