<!--
/**
 * Created by PhpStorm.
 * User: emeka
 * Date: 3/7/18
 * Time: 11:42 PM
 */ -->
@extends('layouts.app')
@section('title')
    View applications for jobs | Biddo
@endsection
@section('content')
@include('partials.header2')
<section class="job-browse section">
<div class="container">
        <div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
                @if($application->count() > 0)
                 <h4><span class="">These services applied for your job </span></h4>
                    <div class="row">

                        @foreach($application as $service)
                        
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="job-list">
                                    <div class="job-list-content">
                                        <h4><a href="{{ url('view-search/'.$service->service->id) }}">{{substr(ucwords(strtolower($service->service->name)), 0, 23) }}</a><span class="pull-right full-time"> {{ substr(ucwords(strtolower($service->service->profession_title)), 0, 23) }}</span></h4>
                                        <p>{{ substr(ucfirst(strtolower($service->service->description)), 0, 240) }}</p>
                                        <div class="job-tag">
                                            <div class="pull-left">
                                                <div class="meta-tag">
                                                    <span title="Location where the service is located"><i class="ti-calendar"></i> {{$service->service->location}}</span>
                                                    <span title="Date the service was registered on Bido">Joined: {{$service->service->created_at->diffForHumans()}}</span>
                                                </div>
                                            </div>
                                            <div class="pull-right">
                                                 <a href="{{ url('view-search/'.$service->service->id) }}" title="Go to service full view" class="btn btn-common btn-rm"><i class="fa fa-view"></i>Full view</a>
                                                 @if($service->postJob->status === 'available' && $service->status === 'not-offered')
                                                <a href="{{ url('accept-job-application/'.$service->postJob->id.'/'.$service->id) }}" title="Accept application" class="btn btn-common btn-rm"><i class="fa fa-edit"></i> Accept</a>
                                                @elseif($service->postJob->status === 'unavailable' && $service->status === 'offered')
                                                <a href="{{ url('cancel-offered-job-application/'.$service->postJob->id.'/'.$service->id) }}" title="Cancel offered application" class="btn btn-common btn-rm"><i class="fa fa-edit"></i> Cancel</a>
                                                 @endif
                                                 <a href="{{ url('delete-job-application/'.$service->id) }}" title="Remove job application" class="btn btn-common btn-rm"><i class="fa fa-close"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>

                @else
                    <div class="col-md-8">
                        <p>There are no applications for this job yet</p>
                    </div>
                @endif
                <ul class="pagination">
                    {{ $application->links() }}
                </ul>

            </div>
        </div>
    </div>
</section>
@endsection