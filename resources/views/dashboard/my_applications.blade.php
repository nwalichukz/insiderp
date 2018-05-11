@extends('layouts.app')
@section('title')
    My Applications | Bido
@endsection

@section('content')
    @include('partials.header2')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">
                    <h3 class="alerts-title">Manage Applications</h3>
                    <hr>
                    @if($applications->count() > 0)
                    @foreach($applications as $application)
                            <div class="manager-resumes-item">
                            <div class="manager-content">
                                <a href="resume.html"><img class="resume-thumb" src="assets/img/jobs/avatar.jpg" alt=""></a>
                                <div class="manager-info">
                                    <div class="manager-name">
                                        <h4><a href="#">{{ $application->postJob->name }}</a></h4>
                                        <span class="location"><i class="ti-location-pin"></i> {{ $application->postJob->user->location }}</span>
                                        <span class="rate"><i class="fa fa-money"></i> {{ $application->postJob->budget }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="update-date">
                                <p class="status">
                                    <strong>Duration:</strong> {{ $application->postJob->duration }}
                                </p>
                                <div class="action-btn">
                                    <a class="btn btn-xs btn-danger" href="#">Delete Offer</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="box">
                            <p>You have not applied for any jobs at the moment... <a href="{{ url('browse_jobs') }}">Apply here</a></p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection