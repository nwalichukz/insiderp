@extends('layouts.app')
@section('title')
Post Job | Bido
@endsection

@section('content')
@include('partials.header2')
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-4 hidden-sm hidden-xs">
                @include('partials.sidebar')
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="page-ads box">
                    <form action="{{ route('postJobSave') }}" method="post" enctype="multipart/form-data" class="form-ad">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label">Job name</label>
                            <input type="text" class="form-control" name="name" placeholder="e.g. I want a professional logo done" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
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
                        <div class="form-group{{ $errors->has('job_description') ? ' has-error' : '' }}">
                            <label class="control-label">Job Description</label>
                            <textarea name="job_description" cols="7" rows="7" class="form-control" placeholder="Job Description">{{ old('job_description') }}</textarea>
                            @if ($errors->has('job_description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('job_description') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('budget') ? ' has-error' : '' }}">
                            <label for="budget">Budget</label>
                            <input type="number" class="form-control" name="budget" placeholder="Your Budget" id="offer_amount" onkeyup="checkAmount()" value="{{ old('budget') }}">
                            @if ($errors->has('budget'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('budget') }}</strong>
                                </span>
                            @endif
                            <span class="help-block">
                                <strong id="error"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="total_amount">Total amount</label>
                            <input type="number" name="total_amount" id="total_amount" disabled="disabled" class="form-control">
                            <span class="">
                                <strong id="total">The total amount is the offer amount plus the commission</strong>
                            </span>
                        </div>
                        {{--
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
                        --}}
                        <button type="submit" class="btn btn-common">Submit your job</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection