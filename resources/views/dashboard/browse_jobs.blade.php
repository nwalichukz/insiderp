@extends('layouts.app')
@section('title')
Browse Jobs | Bido
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
                            <div class="col-md-6">
                                <div class="job-list">
                                    <div class="job-list-content">
                                        <h4><a href="job-details.html">{{ $job->name }}</a><span class="full-time">&#8358; {{ $job->budget }}</span></h4>
                                        <p>{{ $job->job_description }}</p>
                                        <div class="job-tag">
                                            <div class="pull-left">
                                                <div class="meta-tag">
                    
                                                    <span><i class="ti-location-pin"></i>{{$job->user->state}}, {{$job->user->location}}</span>
                                                    <span><i class="ti-time"></i>Duration: {{$job->duration}} days</span>
                                                </div>
                                            </div>
                                            <div class="pull-right">
                                                <a href="{{ url('bid/'.$job->id) }}" title="Apply for this job" class="btn btn-common btn-rm">Apply</a>
                                                <a href="{{ url('cancel-bid/'.$job->id) }}" title="Cancel job application" class="btn btn-common btn-rm">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                @else
                    <div class="col-md-8 col-md-offset-2">
                        <div class="box">
                            <p>There are no available jobs for you at the moment</p>
                        </div>
                    </div>
                @endif
                <ul class="pagination">
                    {{ $jobs->links() }}
                </ul>

            </div>
            {{--
            <div class="col-md-3 col-sm-4">
                <aside>
                    <div class="sidebar">
                        <div class="inner-box">
                            <h3>Categories</h3>
                            <ul class="cat-list">
                                <li>
                                    <a href="#">Finance <span class="num-posts">4,287 Jobs</span></a>
                                </li>
                                <li>
                                    <a href="#">Techonologies <span class="num-posts">4,256 Jobs</span></a>
                                </li>
                                <li>
                                    <a href="#">Art/Design<span class="num-posts">3,245 Jobs</span></a>
                                </li>
                                <li>
                                    <a href="#">Science <span class="num-posts">4,256 Jobs</span></a>
                                </li>
                                <li>
                                    <a href="#">Education Training <span class="num-posts">4,560 Jobs</span></a>
                                </li>
                                <li>
                                    <a href="#">Logistics <span class="num-posts">3,256 Jobs</span></a>
                                </li>
                                <li>
                                    <a href="#">Food Services <span class="num-posts">1,256 Jobs</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="inner-box">
                            <h3>Job Status</h3>
                            <ul class="cat-list">
                                <li>
                                    <a href="#">Full Time <span class="num-posts">12,256 Jobs</span></a>
                                </li>
                                <li>
                                    <a href="#">Part Time <span class="num-posts">6,510 Jobs</span></a>
                                </li>
                                <li>
                                    <a href="#">Freelancer <span class="num-posts">1,171 Jobs</span></a>
                                </li>
                                <li>
                                    <a href="#">Internship <span class="num-posts">876 Jobs</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="inner-box">
                            <h3>Locations</h3>
                            <ul class="cat-list">
                                <li>
                                    <a href="#">New York <span class="num-posts">4,197 Jobs</span></a>
                                </li>
                                <li>
                                    <a href="#">San Francisco <span class="num-posts">2,256 Jobs</span></a>
                                </li>
                                <li>
                                    <a href="#">San Diego <span class="num-posts">3,278 Jobs</span></a>
                                </li>
                                <li>
                                    <a href="#">Los Angeles <span class="num-posts">5,294 Jobs</span></a>
                                </li>
                                <li>
                                    <a href="#">Chicago <span class="num-posts">1,746 Jobs</span></a>
                                </li>
                                <li>
                                    <a href="#">Houston <span class="num-posts">871 Jobs</span></a>
                                </li>
                                <li>
                                    <a href="#">New Orleans <span class="num-posts">2,163 Jobs</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
             --}}
        </div>
    </div>
</section>
@endsection