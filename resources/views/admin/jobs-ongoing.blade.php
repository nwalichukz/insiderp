@extends('layouts.app')
@section('title')
    Admin | Dashboard
@endsection

@section('content')
    @include('partials.header2')

    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    @include('admin.sidebar')
                </div>
                <div class="col-md-8 col-sm-8 com-xs-12">
                    <!-- Users -->
                    <section id="Users">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Jobs Ongoing</h4>
                                        </div>
                                        <table class="table table-striped">
                                            <thead class="thead-inverse">
                                            <tr>
                                                <th>#</th>
                                                <th>Job name</th>
                                                <th>Job owner</th>
                                                <th>Job executor</th>
                                                <th>Amount</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                @foreach($jobs as $job)
                                                    @if($job->job_approval->approval_status == "accepted" && $job->job_progress->progress_status == "ongoing" )
                                                        <td scope="row">{{ $job->id }}</td>
                                                        <td scope="row">{{ $job->job_name }}</td>
                                                        <td>{{ $job->job_owner->name }}</td>
                                                        <td>{{ $job->job_executor->name }}</td>
                                                        <td>{{ $job->total_amount }}</td>
                                                        <td><a href=""><i class="fa fa-angle-right"></i> Details</a></td>
                                                    @endif
                                                @endforeach

                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection