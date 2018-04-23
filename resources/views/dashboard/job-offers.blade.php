@extends('layouts.app')
@section('title')
    Job offers | Bido
@endsection

@section('content')
    @include('partials.header2')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">
                    <h5 class="alerts-title">Job offers</h5>
                    <hr>
                    @foreach($jobs as $job)
                        @if($job->job_progress->progress_status === "pending")
                            <div class="manager-resumes-item">
                                <div class="manager-content">
                                    <a href="resume.html"><img class="resume-thumb" src="assets/img/jobs/avatar.jpg" alt=""></a>
                                    <div class="manager-info">
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="manager-name">
                                                        <h4><a href="#">{{ ucfirst($job->job_owner->name) }}</a></h4>
                                                        <h5>{{ ucfirst($job->name) }}</h5>
                                                    </div>
                                                    <div class="manager-meta">
                                                        <span class="location"><i class="ti-location-pin"></i> {{ $job->job_owner->location }}</span>
                                                        <span class="rate"><i class="fa fa-money"></i> {{ $job->offer_amount }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h5>Job Description</h5>
                                                    <hr>
                                                    <p>{{ substr($job->description, 0, 30) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="update-date">
                                    <p class="status">
                                        <strong>offered on:</strong> Feb 22, 2018 <br>
                                        <strong>Duration:</strong> Feb 25, 2018
                                    </p>
                                    <div class="action-btn">
                                        <a class="btn btn-xs btn-success" href="#">Accept job</a>
                                        <button class="btn btn-xs btn-common" data-toggle="modal" data-target="#rejectJobModal">Reject job</button>
                                    </div>
                                </div><!-- line modal -->
                                <div class="modal fade" id="rejectJobModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                <h3 class="modal-title" id="lineModalLabel">Reject offer</h3>
                                            </div>
                                            <div class="modal-body">

                                                <!-- content goes here -->
                                                <form>
                                                    <div class="form-group">
                                                        <label for="reason">Reason:</label>
                                                        <select name="reason" id="" class="form-control selectpicker">
                                                            <option>Not interested</option>
                                                            <option>Too busy to take on job</option>
                                                            <option>Job not well detailed</option>
                                                            <option>Job is too difficult</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="message">Message <small>(optional)</small>:</label>
                                                        <textarea name="message" cols="7" rows="5" class="form-control" placeholder="Message goes here"></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-common">Reject job</button>
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
                        @else
                            <p>No job offers at the moment</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection