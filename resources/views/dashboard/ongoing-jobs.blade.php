@extends('layouts.app')
@section('title')
    Jobs Completed | Bido
@endsection

@section('content')
    @include('partials.header2')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-2">
                    <h5 class="alerts-title">Ongoing jobs</h5>
                    <hr>
                    @foreach($jobs as $job)
                            @if($job->job_progress->progress_status === "ongoing")
                                <div class="manager-resumes-item">
                            <div class="manager-content">
                                <a href="resume.html"><img class="resume-thumb" src="assets/img/jobs/avatar.jpg" alt=""></a>
                                <div class="manager-info">
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="manager-name">
                                                    <h4><a href="#">{{ ucfirst($job->job_owner->name) }}</a></h4>
                                                    <h5>{{ ucfirst($job->job_name) }}</h5>
                                                    <span class="location"><i class="ti-location-pin"></i> {{ ucfirst($job->job_owner->location) }}</span>
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
                                    <strong>started on:</strong> Feb 22, 2018 <br>
                                    <strong>Due date:</strong> Feb 25, 2018
                                </p>
                                <div class="action-btn">
                                    <button data-toggle="modal" data-target="#addPreviewModal" class="btn btn-xs btn-gray" href="#">Add preview</button>
                                    <button data-toggle="modal" data-target="#requestExtensionModal" class="btn btn-xs btn-common">Request extension</button>
                                    <button data-toggle="modal" data-target="#quitJobModal" class="btn btn-xs btn-common">Quit job</button>
                                </div>
                            </div><!-- line modal -->
                            <div class="modal fade" id="addPreviewModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h3 class="modal-title" id="lineModalLabel">Add a work preview</h3>
                                        </div>
                                        <div class="modal-body">

                                            <!-- content goes here -->
                                            <form>
                                                <div class="form-group">
                                                    <label for="attachment">attach files:</label>
                                                    <input type="file" name="attachment[]" id="attachment" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Message <small>(Optional)</small>:</label>
                                                    <textarea name="report_message" cols="7" rows="5" class="form-control" placeholder="Preview Work Message"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-common">Send Preview</button>
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
                            <div class="modal fade" id="requestExtensionModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h3 class="modal-title" id="lineModalLabel">Request Extension</h3>
                                        </div>
                                        <div class="modal-body">

                                            <!-- content goes here -->
                                            <form>
                                                <div class="form-group">
                                                    <label for="extension">How Long:</label>
                                                    <select name="extension" id="" class="form-control selectpicker">
                                                        <option value="3">3 days</option>
                                                        <option value="4">4 days</option>
                                                        <option value="5">5 days</option>
                                                        <option value="6">6 days</option>
                                                        <option value="7">7  days</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="reason">Reason:</label>
                                                    <textarea name="message" cols="7" rows="5" class="form-control" placeholder="Reason for extension"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <p>By clicking request you agree with our <a href="#">Job extension policy</a></p>
                                                </div>
                                                <button type="submit" class="btn btn-common">Request Extension</button>
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
                            <div class="modal fade" id="quitJobModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h3 class="modal-title" id="lineModalLabel">Quit job</h3>
                                        </div>
                                        <div class="modal-body">

                                            <!-- content goes here -->
                                            <form>
                                                <div class="form-group">
                                                    <label for="offence">Reason:</label>
                                                    <select name="reason" id="" class="form-control selectpicker">
                                                        <option>No longer interested</option>
                                                        <option>Don't have the skills required</option>
                                                        <option>Job not well detailed</option>
                                                        <option>Job is too difficult</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="message">Message <small>(optional)</small>:</label>
                                                    <textarea name="message" cols="7" rows="5" class="form-control" placeholder="Message"></textarea>
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
                                @else
                                    <p>No ongoing jobs</p>
                            @endif
                        @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection