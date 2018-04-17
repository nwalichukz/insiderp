@extends('layouts.app')
@section('title')
    {{ $service->name }} | Bido
@endsection
@section('content')
    @include('partials.header2')

    <div id="content">
        <section class="job-detail section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="header-detail">
                            <div class="header-content pull-left">
                                <h3><a href="#">{{ $service->name }}</a></h3>
                                <p><span>Date Created: {{ $service->created_at->diffForHumans() }}</span></p>
                                <p>Amount per job: <strong class="price">$7000 - $7500</strong></p>
                            </div>
                            <div class="detail-company pull-right text-right">
                                <div class="img-thum">
                                    <img class="img-responsive" src="{{ asset('assets/img/jobs/recent-job-detail.jpg') }}" alt="">
                                </div>
                                <div class="name pull-right">
                                    <h4>{{ $service->profession_title }}</h4>
                                    <h5>{{ ucfirst($service->location) }}</h5>
                                </div>
                            </div>
                            <div class="clearfix">
                                <div class="meta">
                                    <span><a class="btn btn-border btn-sm" href="{{ url('service/edit', $service->id) }}" data-toggle="tooltip" data-placement="top" title="Edit Service"><i class="fa fa-edit"></i> Edit Service</a></span>
                                    <span><a class="btn btn-border btn-sm" href="{{ url('service/delete/'. $service->id.'/'.$service->vendor_id) }}" data-toggle="tooltip" data-placement="top" title="Delete Service"><i class="fa fa-close"></i> Delete Service</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="content-area">
                            <div class="clearfix">
                                <div class="box">
                                    <h4>Basic Information</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="dash-box dash-box-color-1">
                                                <div class="dash-box-icon">
                                                    <i class="fa fa-briefcase"></i>
                                                </div>
                                                <a href="{{ url('ongoing-jobs') }}">
                                                    <div class="dash-box-body">
                                                        <span class="dash-box-count">8</span>
                                                        <span class="dash-box-title">Ongoing Jobs</span>
                                                    </div>
                                                </a>

                                                <div class="dash-box-action">
                                                    <a href="{{ url('ongoing-jobs') }}">More Info</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="dash-box dash-box-color-3">
                                                <div class="dash-box-icon">
                                                    <i class="fa fa-handshake-o"></i>
                                                </div>
                                                <a href="{{ url('job-offers') }}">
                                                    <div class="dash-box-body">
                                                        <span class="dash-box-count">5</span>
                                                        <span class="dash-box-title">Job Offers</span>
                                                    </div>
                                                </a>

                                                <div class="dash-box-action">
                                                    <a href="{{ url('job-offers') }}">More Info</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="dash-box dash-box-color-2">
                                                <div class="dash-box-icon">
                                                    <i class="fa fa-file-code-o"></i>
                                                </div>
                                                <a href="{{ url('jobs-completed') }}">
                                                    <div class="dash-box-body">
                                                        <span class="dash-box-count">3</span>
                                                        <span class="dash-box-title">Jobs Completed</span>
                                                    </div>
                                                </a>

                                                <div class="dash-box-action">
                                                    <a href="{{ url('jobs-completed') }}">More Info</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection