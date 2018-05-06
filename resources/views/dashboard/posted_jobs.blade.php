@extends('layouts.app')
@section('title')
    Posted Jobs
@endsection

@section('content')
    @include('partials.header2')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1">
                    <div class="job-alerts-item">
                        <h3 class="alerts-title">Posted Jobs</h3>

                        @foreach($jobs as $job)
                        <div class="alerts-content">
                            <div class="row">
                                <div class="col-md-3">
                                    <h3>{{ $job->name    }}</h3>
                                    <span class="location"><i class="ti-location-pin"></i> </span>
                                </div>
                                <div class="col-md-3">
                                    <p>{{ $job->job_category }}</p>
                                </div>
                                <div class="col-md-3">
                                    <p><span class="full-time">{{ $job->total_amount }}</span></p>
                                </div>

                            </div>
                        </div>
                        @endforeach
                        </div>

                        <br>
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