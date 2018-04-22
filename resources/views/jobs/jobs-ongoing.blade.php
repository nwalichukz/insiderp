@extends('layouts.app')
@section('title')
    Ongoing Jobs | Bido
@endsection

@section('content')
    @include('partials.header2')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-10 col-xs-12 col-md-offset-1">
                    <div class="job-alerts-item candidates">
                        <h4 class="alerts-title">Ongoing jobs</h4>
                        @foreach($jobs_ongoing as $job)
                            @if($job->job_progress->progress_status === "ongoining")
                                <div class="manager-resumes-item">
                                    <div class="manager-content">
                                <a href="resume.html"><img class="resume-thumb" src="assets/img/jobs/avatar.jpg" alt=""></a>
                                <div class="manager-info">
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="manager-name">
                                                    <h4><a href="#">{{ $job->job_executor->name }}</a></h4>
                                                    <h5>{{ $job->job_executor->profession_title }}</h5>
                                                </div>
                                                <div class="manager-meta">
                                                    <span class="location">Location</span>
                                                    <span class="rate"><i class="fa fa-money"></i> {{ $job->offer_amount }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
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
                                    <strong>offered on:</strong> Fab 22, 2017 <br>
                                    <strong>Time to Completion:</strong> 2 days
                                </p>
                                <div class="action-btn">
                                    <a class="btn btn-xs btn-gray" href="#">Make Payment</a>
                                    <a class="btn btn-xs btn-gray" href="#">View work progress</a>
                                    <button data-toggle="modal" data-target="#reportServiceModal" href="#" class="btn btn-xs btn-danger">Report Service</button>
                                </div>
                            </div>
                                </div>
                             @else
                                <p>No ongoing jobs at the moment</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- line modal -->
        <div class="modal fade" id="reportServiceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h3 class="modal-title" id="lineModalLabel">Report {{-- $fullview->name --}}</h3>
                    </div>
                    <div class="modal-body">

                        <!-- content goes here -->
                        <form>
                            <div class="form-group">
                                <input type="hidden" name="service_id" value="{{-- $fullview->id --}}">
                            </div>
                            <div class="form-group">
                                <label for="offence">Offence:</label>
                                <select name="offence" id="" class="form-control selectpicker">
                                    <option>Deadline not met</option>
                                    <option>privacy Violation</option>
                                    <option>Job not conclusive</option>
                                    <option>Other reasons</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Report:</label>
                                <textarea name="report_message" cols="7" rows="5" class="form-control" placeholder="Report Message"></textarea>
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