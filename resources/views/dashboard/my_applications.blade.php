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
                       <div class="col-md-12 col-sm-12 col-xs-12">
            
                                <div class="job-list">
                                    <div class="job-list-content">
                                        <h4><a href="">{{substr(ucwords(strtolower($application->PostJob->name)), 0, 23) }}</a><span  title="The budget for the job" class="pull-right badge">&#8358; {{ $application->postJob->budget }}</span></h4>
                                        <p>{{ substr(ucfirst(strtolower($application->postJob->job_description)), 0, 240) }}</p>
                                        <div class="job-tag">
                                            <div class="pull-left">
                                                <div class="meta-tag">
                                                    <span class="badge" title="The status of the job at the moment">Status: {{$application->postJob->status}}</span>
                                                    <span title="Date the job was posted">Posted: {{$application->postJob->created_at->diffForHumans()}}</span>
                                                    @if($application->postJob->status === 'unavailable' && $application->status === 'offered' && $service->id == $application->service_id)
                                                 <span class="btn btn-primary">congrats job offered to you </span>
                                                 @else
                                                     <span title="Date you applied for the job">Applied: {{$application->created_at->diffForHumans()}}</span>
                                                     @endif
                                                </div>
                                            </div>
                                            <div class="pull-right">
                                                 @if($application->postJob->status === 'available' && $application->status === 'not-offered')
                                                   <a href="{{ url('view-service-executing-this-job/'.$application->postJob->id) }}" title="View the service this job was offered to" class="btn btn-common btn-rm"><i class="fa fa-edit"></i> Full view</a>
                                               
                                                @elseif($application->postJob->status === 'unavailable' && $application->status === 'offered')
                                               <a href="{{ url('cancel-offered-job-application/'.$application->postJob->id.'/'.$application->id) }}" title="Cancel your application for this job" class="btn btn-common btn-rm"><i class="fa fa-close"></i></a>
                                                 @endif

                                            </div>
                                        </div>
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