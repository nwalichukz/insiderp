@extends('layouts.app')
@section('title')
    View Works
@endsection
@section('content')
    @include('partials.header2')
    <div id="content">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="content-area">
                <div class="clearfix">
                    <div class="box">
                        <h4>{{ $fullview->name }}</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <center>
                                    <img src="{{ asset('assets/img/blog/author.jpg') }}" name="avatar" width="140" height="140" border="0" class="img-circle"></a>
                                    <h3 class="media-heading">{{ ucfirst($fullview->user->name) }} <small>{{ ucfirst($fullview->user->location) }}</small></h3>
                                    <div class="social-link">
                                        <a href="#"  data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-f"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube"></i></a>
                                    </div>
                                    <span><strong>Skills: </strong></span>
                                    <span class="label label-warning">HTML5/CSS</span>
                                    <span class="label label-info">Adobe CS 5.5</span>
                                    <span class="label label-info">Microsoft Office</span>
                                    <span class="label label-success">Windows XP, Vista, 7</span>
                                </center>
                            </div>
                            <br>
                            <div class="col-md-4">
                                <aside>
                                    <div class="sidebar">
                                        <div class="box">
                                            <h2 class="small-title">Service Details</h2>
                                            <ul class="detail-list">
                                                <li>
                                                    <a href="#">Service Id</a>
                                                    <span class="type-posts">BD1246789</span>
                                                </li>
                                                <li>
                                                    <a href="#">Profession</a>
                                                    <span class="type-posts">{{ $fullview->profession_title }}</span>
                                                </li>
                                                <li>
                                                    <a href="#">Location</a>
                                                    <span class="type-posts">{{ $fullview->location }}</span>
                                                </li>
                                                <li>
                                                    <a href="#">Jobs Completed</a>
                                                    <span class="type-posts">30</span>
                                                </li>
                                                <li>
                                                    <a href="#">Verification Status</a>
                                                    <span class="type-posts">Verified <i class="fa fa-check-circle"></i></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                            <br>
                            <div class="col-md-4">
                                <div class="box">
                                    <form action="">
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="Full Name" class="form-control">
                                            <input type="hidden" name="service_email" value="{{ $fullview->user->email }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Email Address" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" placeholder="Phone Number" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="message"  cols="7" rows="2" class="form-control" placeholder="Message"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Send</button>
                                            Send an enquiry to {{ $fullview->name }}
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-3">
                                <h4 class="col-md-offset-4">Previous Works</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-4 col-md-offset-3">
                                    <h4 class="col-md-offset-4">Job Name</h4>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <a href="{{ asset('images/recent-post-03.jpg') }}" class="swipebox" title="Caption Goes Here">
                                    <img class="responsive-image preview" src="{{ asset('images/recent-post-03.jpg') }}" alt="img">
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <a href="{{ asset('images/blog-post-01.jpg') }}" class="swipebox" title="Caption Goes Here">
                                    <img class="responsive-image preview" src="{{ asset('images/blog-post-01.jpg') }}" alt="img">
                                </a>
                                <br>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <a href="{{ asset('images/blog-post-02.jpg') }}" class="swipebox" title="Caption Goes Here">
                                    <img class="responsive-image preview" src="{{ asset('images/blog-post-02.jpg') }}" alt="img">
                                </a>
                                <br>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <center>
                                @if(Auth::check())
                                    <button data-toggle="modal" data-target="#hireModal" class="btn btn-common">good enough? Hire {{ $fullview->name }}</button>
                                @else
                                    <a href="{{ url('/register') }}" class="btn btn-warning">You have to be registered to hire someone</a>
                                @endif
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- line modal -->
        <div class="modal fade" id="hireModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h3 class="modal-title" id="lineModalLabel">Hire {{ $fullview->name }}</h3>
                    </div>
                    <div class="modal-body">

                        <!-- content goes here -->
                        <form>
                            <div class="form-group">
                                <input type="hidden" name="service_id" value="{{ $fullview->id }}">
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