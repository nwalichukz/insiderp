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
                                            </div>
                                            <div class="col-md-8">
                                                <div class="manager-info">
                                                    <h5>Job Description</h5>
                                                    <hr>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo in placeat quas soluta voluptatum? Blanditiis delectus deleniti earum nemo quidem repellat totam unde....</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="manager-meta">
                                            <span class="location"><i class="ti-location-pin"></i> Location</span>
                                            <span class="rate"><i class="fa fa-money"></i> offer amount</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="update-date">
                                <p class="status">
                                    <strong>offered on:</strong> Fab 22, 2017 <br>
                                    <strong>Time Left:</strong> 2 days
                                </p>
                                <div class="action-btn">
                                    <a class="btn btn-xs btn-gray" href="#">Payment status</a>
                                    <button data-toggle="modal" data-target="#addPreviewModal" class="btn btn-xs btn-gray" href="#">Add preview</button>
                                    <button data-toggle="modal" data-target="#reportProgressModal" href="#" class="btn btn-xs btn-danger">Progress report</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- preview modal -->
        <div class="modal fade" id="addPreviewModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h3 class="modal-title" id="lineModalLabel">Add a preview</h3>
                    </div>
                    <div class="modal-body">

                        <!-- content goes here -->
                        <form>
                            <div class="form-group">
                                <input type="hidden" name="service_id" value="{{-- $fullview->id --}}">
                            </div>

                            <div class="form-group">
                                <label for="file">Upload file:</label>
                                <input type="file" name="preview[]" id="" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-common">Send preview</button>
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
                                <button type="button" id="saveImage" class="btn btn-default btn-hover-green" data-action="save" role="button">send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- line modal -->
        <div class="modal fade" id="progressModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
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
                                <label for="offence">Progress:</label>
                                <select name="progress_status" id="" class="form-control selectpicker">
                                    <option>Just Started</option>
                                    <option>quarter done</option>
                                    <option>half done</option>
                                    <option>Finishing Up</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">message:(optional)</label>
                                <textarea name="progress_message" cols="7" rows="5" class="form-control" placeholder="Report Message"></textarea>
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
                                <button type="button" id="saveImage" class="btn btn-default btn-hover-green" data-action="save" role="button">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection