@extends('layouts.app')
@section('title')
    Full view - {{ $fullview->name }}
@endsection
@section('content')
@include('partials.header2')
@include('partials.searchform')
   
    <div id="content">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="content-area">
                <div class="clearfix">
                    <div class="box">
                        <h4>{{ $fullview->name }}</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <center>
                                    @if(!empty($search_result->user->avater->avater))
                                    <img src="{{ asset("images/user/".$search_result->user->avater->avater) }}" name="avatar" width="140" height="140" border="0" class="img-circle"></a>
                                    @else
                                    <img src="{{ asset("images/logo/logo.png") }}" alt="">
                                    @endif

                                    <h3 class="media-heading">{{ ucfirst($fullview->user->name) }} <small>{{ ucfirst($fullview->user->location) }}</small></h3>
                                    <div class="social-link">
                                        <a href="#"  data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-f"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube"></i></a>
                                    </div>

                                    <div class="col-md-4">
                                        <p>{{ $fullview->user->description }}</p>
                                    </div>
                                </center>
                            </div>
                            <br>
                            <div class="col-md-4">
                                <aside>
                                    <div class="sidebar">
                                        <div class="box">
                                            <h4 class="small-title">Service Details</h4>
                                            <ul class="detail-list">
                                                <li>
                                                    <a href="#">Service Id</a>
                                                    <span class="type-posts">BD-{{$fullview->id}}</span>
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
                                                    <a href="#">Email</a>
                                                    <span class="type-posts">{{ $fullview->user->email }}</span>
                                                </li>
                                                <li>
                                                    <a href="#">Phone</a>
                                                    <span class="type-posts">{{ $fullview->user->phone_no }}</span>
                                                </li>
                                                <li>
                                                    <a href="#">Jobs Completed</a>
                                                    <span class="type-posts">30</span>
                                                </li>
                                                <li>
                                                    <a href="#">Verification Status</a>
                                                    <span class="type-posts">Verified <i class="fa fa-check-circle"></i></span>
                                                </li>
                                                <li>
                                                    <a href="#">Date Joined</a>
                                                    <span class="type-posts">{{ $fullview->user->created_at->diffForHumans()  }} <i class="fa fa-check-circle"></i></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </aside>
                            </div>

                            <div class="col-md-4">
                                <div class="status"> </div>
                                <div class="successMsg"> </div>
                                <aside>
                                    <div class="sidebar">
                                        <div class="box">
                                            <form id="sendEquiry" onsubmit="sendEquiry(event);" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8" files="true">
                                                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <div class="form-group">
                                                    <input type="text" name="name" placeholder="Full Name" class="form-control" required>
                                                    <input type="hidden" name="service_email" value="{{ $fullview->user->email }}" class="form-control">
                                                    <input type="hidden" name="id" value="{{ $fullview->user->id }}" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" name="email" placeholder="Email Address" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="phone_no" placeholder="Phone Number" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="message"  cols="7" rows="1" class="form-control" placeholder="Please enter your message" required>
                                                    </textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-common">Send</button>
                                                    <p>Send an enquiry to {{ $fullview->name }}</p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </aside>
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
                            @if($fullview->images->count() > 0)
                                @foreach($fullview->images as $image)
                                    <div class="col-md-4">
                                        <a href="{{ asset('images/prev/'.$image->name) }}" class="swipebox" title="Caption Goes Here">
                                            <img class="img-responsive img-thumbnail img-raised preview" src="{{ asset('images/prev/'.$image->name) }}" alt="img">
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <br>
                        <div class="row">
                            <center>
                                @if(Auth::check())
                                    <button data-toggle="modal" data-target="#hireModal" class="btn btn-common">good enough? Hire {{ $fullview->name }}</button>
                                @else
                                    <button data-toggle="modal" data-target="#authModal" class="btn btn-warning">You have to Login to hire someone</button>
                                @endif
                                    <hr>
                                    <a href="{{ url('about') }}">About us</a> |
                                    <a href="{{ url('terms') }}">Terms</a> |
                                    <a href="{{ url('contact') }}">Contact us</a> |
                                    <a href="{{ url('about') }}">About us</a>
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
                        <form action="{{url('/make-offer')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="hidden" name="service_id" value="{{ $fullview->id }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Job Name</label>
                                <input type="text" name="job_name" class="form-control" id="job_name" placeholder="Job Name" required>
                            </div>
                            <div class="form-group">
                                <label for="amount">Offer Amount</label>
                                <input type="number" name="offer_amount" id="offer_amount" placeholder="How much can you pay for the job, the least on this platform is 1000"
                                 class="form-control" onkeyup="checkAmount();" required>
                                <span class="help-block">
                                    <strong id="error"></strong>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="amount">Total amount</label>
                                <input type="number" name="total_amount" id="total_amount" disabled="disabled" class="form-control">
                                <span class="">
                                    <strong id="total">The total amount is the offer amount plus the commission</strong>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="duration">Duration</label>
                                <select name="duration" class="form-control" required>
                                    <option value="1">1 day</option>
                                    <option value="2">2 days</option>
                                    <option value="3">3 days</option>
                                    <option value="4">4 days</option>
                                    <option value="5">5 days</option>
                                    <option value="6">6 days</option>
                                    <option value="7">7  days</option>
                                    <option value="8">8 days</option>
                                    <option value="9">9 days</option>
                                    <option value="10">10 days</option>
                                    <option value="11">11 days</option>
                                    <option value="12">12 days</option>
                                    <option value="13">13 days</option>
                                    <option value="14">14 days</option>
                                    <option value="15">15 days</option>
                                    <option value="21">3 weeks</option>
                                    <option value="30">1 months</option>
                                    <option value="60">2 months</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Job Description</label>
                                <textarea name="description" cols="7" rows="5" class="form-control" placeholder="Job Description; how you want it done" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-common">Submit</button>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- Auth modal -->
        <div class="modal fade" id="authModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h3 class="modal-title" id="lineModalLabel">Hire {{ $fullview->name }}</h3>
                    </div>
                    <div class="modal-body">
                        <!-- content goes here -->
                        <form action="{{ url('post-login-modal') }}" method="post">
                            {{ csrf_field() }}
                            <h3>Login</h3>
                            <div class="form-group">
                                <label for="phone">Email Address</label>
                                <input type="text" class="form-control" name="email" placeholder="Email address e.g jon@gmail.com">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="checkbox-item">
                                <div class="checkbox">
                                    <label for="rememberme" class="rememberme">
                                        <input name="rememberme" id="rememberme" value="forever" type="checkbox"> Remember Me
                                    </label>
                                </div>
                                <p class="cd-form-bottom-message"><a href="{{url("reset-password")}}">Lost your password?</a></p>
                            </div>
                            <div class="form-group">
                                <button type="submit" value="" class="btn btn-common">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

@endsection
