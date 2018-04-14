@extends('layouts.app')
@section('title')
    Jobs Completed | Bido
@endsection

@section('content')
    @include('partials.header2')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">
                    <div class="job-alerts-item candidates">
                        <h5 class="alerts-title">Completed jobs</h5>
                        <div class="manager-resumes-item">
                            <div class="manager-content">
                                <a href="resume.html"><img class="resume-thumb" src="assets/img/jobs/avatar.jpg" alt=""></a>
                                <div class="manager-info">
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="manager-name">
                                                    <h4><a href="#">User Name</a></h4>
                                                    <h5>Job Name</h5>
                                                </div>
                                                <div class="manager-meta">
                                                    <span class="location">Location</span>
                                                    <span class="rate"><i class="fa fa-money"></i> offer amount</span>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="manager-info">
                                                    <h5>Job Description</h5>
                                                    <hr>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo in placeat quas soluta voluptatum? Blanditiis delectus deleniti earum nemo quidem repellat totam unde....</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="update-date">
                                <p class="status">
                                    <strong>offered on:</strong> Feb 22, 2018 <br>
                                    <strong>completed on:</strong> Feb 25, 2018
                                </p>
                                <div class="action-btn">
                                    <a class="btn btn-xs btn-gray" href="#">View Job Details</a>
                                    <button data-toggle="modal" data-target="#reportServiceModal" class="btn btn-xs btn-danger" href="#">Report Service</button>
                                </div>
                            </div>
                        </div>
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
                                    <option>Work not Conclusive</option>
                                    <option>Job not done right</option>
                                    <option>Contract violation</option>
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