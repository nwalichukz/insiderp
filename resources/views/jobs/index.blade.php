@extends('layouts.app')
@section('title')
    My Jobs | Bido
@endsection

@section('content')
    @include('partials.header2')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">
                    <div class="job-alerts-item candidates">
                        <h4 class="alerts-title">Manage  jobs you Offered</h4>
                        @foreach($jobs as $job)
                            <div class="manager-resumes-item">
                            <div class="manager-content">
                                <a href="resume.html"><img class="resume-thumb" src="assets/img/jobs/avatar.jpg" alt=""></a>
                                <div class="manager-info">
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="manager-name">
                                                    <h4><a href="#">{{ $job->job_executor->name }}</a></h4>
                                                    <h5>{{ $job->job_executor->profession_title }}</h5>
                                                </div>
                                                <div class="manager-meta">
                                                    <span class="location">{{ $job->job_executor->location }}</span>
                                                    <span class="rate"><i class="fa fa-money"></i> {{ $job->offer_amount }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <h5>Job Description</h5>
                                                <hr>
                                                <p>{{ $job->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="update-date">
                                <p class="status">
                                    <strong>offered on:</strong> {{ $job->created_at->toFormattedDateString() }}
                                </p>
                                <div class="action-btn">
                                    <button data-toggle="modal" data-target="#editOfferModal" class="btn btn-xs btn-gray" href="#">Edit offer</button>
                                    <a class="btn btn-xs btn-danger" href="#">Cancel Offer</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- line modal -->
        <div class="modal fade" id="editOfferModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h3 class="modal-title" id="lineModalLabel">Edit Offer</h3>
                    </div>
                    <div class="modal-body">

                        <!-- content goes here -->
                        <form>
                            <div class="form-group">
                                <input type="hidden" name="service_id" value="{{-- $fullview->id --}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Job Name</label>
                                <input type="text" name="job_name" class="form-control" id="jobname" placeholder="Job Name">
                            </div>
                            <div class="form-group">
                                <label for="amount">Offer Amount</label>
                                <input type="text" name="amount" id="amount" class="form-control" onkeyup="checkAmount();">
                                <span class="help-block">
                                    <strong id="error"></strong>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="duration">Duration</label>
                                <select name="duration" class="form-control">
                                    <option value="">3 - 7 days</option>
                                    <option value="">7 - 14 days</option>
                                    <option value="">2 - 4 weeks</option>
                                    <option value="">1 - 3 months</option>
                                    <option value="">3 - 6 months</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Job Description</label>
                                <textarea name="job_description" cols="7" rows="5" class="form-control" placeholder="Job Description"></textarea>
                            </div>
                            <button type="submit" class="btn btn-common">Submit</button>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
                            </div>
                            <div class="btn-group btn-delete hidden" role="group">
                                <button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" id="saveImage" class="btn btn-default btn-hover-green" data-action="save" role="button">submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection