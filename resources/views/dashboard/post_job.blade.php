@extends('layouts.app')
@section('title')
Post Job | Bido
@endsection

@section('content')
@include('partials.header2')
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-9 col-md-offset-2">
                <div class="page-ads box">
                    <form action="{{ route('postJobSave') }}" method="post" enctype="multipart/form-data" class="form-ad">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label">Job name</label>
                            <input type="text" class="form-control" name="job_name" placeholder="e.g. I want a professional logo done">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Category</label>
                            <div class="search-category-container">
                                <label class="styled-select">
                                    <select class="dropdown-product selectpicker" name="job_category">
                                        <option value="">Select Service Category</option>
                                        <option>Entertainment</option>
                                        <option>Business</option>
                                        <option>Education/Training</option>
                                        <option>Art/Design</option>
                                        <option>Events and Lifestyle</option>
                                        <option>Programming and IT</option>
                                        <option>Sewing and Makeups</option>
                                        <option>Repairs</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Job Tags <span>(optional)</span></label>
                            <input type="text" class="form-control" placeholder="e.g.PHP,Social Media,Management" name="tags">
                            <p class="note">Comma separate tags, such as required skills or technologies, for this job.</p>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Job Description</label>
                            <textarea name="description" cols="7" rows="7" :name="description" class="form-control" placeholder="Job Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Duration <span></span></label>
                            <input type="text" class="form-control" placeholder="yyyy-mm-dd">
                            <p class="note">Deadline for new applicants.</p>
                        </div>
                        <div class="divider"><h3>Company Details</h3></div>
                        <div class="form-group">
                            <label class="control-label">Company Name</label>
                            <input type="text" class="form-control" placeholder="Enter the name of the company">
                        </div>
                        <div class="form-group">
                            <label for="sample">Upload sample photo</label>
                            <div class="button-group">
                                <div class="action-buttons">
                                    <div class="upload-button">
                                        <button class="btn btn-common btn-sm">Browse</button>
                                        <input id="sample" type="file">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="btn btn-common">Submit your job</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection