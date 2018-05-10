<!--
/**
 * Created by PhpStorm.
 * User: emeka
 * Date: 3/7/18
 * Time: 11:42 PM
 */ -->
@extends('layouts.app')
@section('title')
    Job Applications | Biddo
@endsection

@section('content')
@include('partials.header2')
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">
                <div class="job-alerts-item candidates">
                    <h3 class="alerts-title">Manage Applications</h3>
                    <div class="manager-resumes-item">
                        <div class="manager-content">
                            <a href="resume.html"><img class="resume-thumb" src="assets/img/jobs/avatar.jpg" alt=""></a>
                            <div class="manager-info">
                                <div class="manager-name">
                                    <h4><a href="#">name</a></h4>
                                    <h5>Profession Title</h5>
                                </div>
                                <div class="manager-meta">
                                    <span class="location"><i class="ti-location-pin"></i> location</span>
                                    <span class="rate"><i class="fa fa-money"></i> amount</span>
                                </div>
                            </div>
                        </div>
                        <div class="update-date">
                            <p class="status">
                                <strong>Updated on:</strong> Fab 22, 2017
                            </p>
                            <div class="action-btn">
                                <a class="btn btn-xs btn-danger" href="#">Delete</a>
                                <a class="btn btn-xs btn-success" href="#">Offer Job</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection