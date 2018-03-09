<!--
/**
 * Created by PhpStorm.
 * User: emeka
 * Date: 3/7/18
 * Time: 11:42 PM
 */ -->
@extends('layouts.app')
@section('title')
    Job Offers | Biddo
@endsection

@section('content')

    @include('partials.header2')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    @include('partials.sidebar')
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="job-alerts-item">
                        <h3 class="alerts-title">Pending Applications</h3>
                        <div class="job-list">
                            <div class="thumb">
                                <a href="#"><img src="assets/img/jobs/img-1.jpg" alt=""></a>
                            </div>
                            <div class="job-list-content">
                                <h4><a href="#">{ Job Title }</a><span class="full-time">Status</span></h4>
                                <p>Job Description</p>
                                <div class="job-tag">
                                    <div class="pull-left">
                                        <div class="meta-tag">
                                            <span><a href="browse-categories.html"><i class="ti-brush"></i>Art/Design</a></span>
                                            <span><i class="ti-location-pin"></i>Location</span>
                                            <span><i class="ti-time"></i>Time Frame</span>
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        <div class="btn btn-common btn-rm">Cancel Application</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <ul class="pagination">
                            <li class="active"><a href="#" class="btn btn-common"><i class="ti-angle-left"></i> prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li class="active"><a href="#" class="btn btn-common">Next <i class="ti-angle-right"></i></a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection