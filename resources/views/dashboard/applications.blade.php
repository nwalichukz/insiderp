@extends('layouts.app')
@section('title')
    My Posted Jobs | Biddo
@endsection
@section('content')
@include('partials.header2')
<section class="job-browse section">
<div class="container">
        <div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
                @if($jobs->count() > 0)
                    <div class="row">
                        @foreach($jobs as $job)
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="job-list">
                                    <div class="job-list-content">
                                        <h4><a href="job-details.html">{{ $job->name }}</a><span class="full-time">&#8358; {{ $job->total_amount }}</span></h4>
                                        <p>{{ $job->job_description }}</p>
                                        <div class="job-tag">
                                            <div class="pull-left">
                                                <div class="meta-tag">
                
                                                    <span><i class="ti-time"></i>Duration:@if($job->duration > 1) {{$job->duration}} days @else {{$job->duration}} day @endif</span>
                                                </div>
                                            </div>
                                            <div class="pull-right">
                                                 <a href="{{ url('view-applications/'.$job->id) }}" title="view bids for this job" class="btn btn-common btn-rm"><i class="fa fa-view"></i>view applications</a>
                                                <a href="{{ url('edit-posted-job/'.$job->id) }}" title="Edit posted job" class="btn btn-common btn-rm"><i class="fa fa-edit"></i></a>
                                                 <a href="{{ url('delete-posted-job/'.$job->id) }}" title="delete posted job" class="btn btn-common btn-rm"><i class="fa fa-close"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>

                @else
                    <div class="col-md-8">
                        <p>There are no available jobs for you at the moment</p>
                    </div>
                @endif
                <ul class="pagination">
                    {{ $jobs->links() }}
                </ul>

            </div>
        </div>
    </div>
</section>
@endsection