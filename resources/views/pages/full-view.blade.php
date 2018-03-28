@extends('layouts.app')
@section('title')
    View Works
@endsection
@section('content')
    @include('partials.header2')
    <div id="content">
        <div class="container">
            <div class="j" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="card-title" id="myModalLabel">More About {{ $fullview->user->name }}</h4>
                        </div>
                        <center class="card-body">
                            <center>
                                <img src="{{ asset('assets/img/blog/author.jpg') }}" name="avatar" width="140" height="140" border="0" class="img-circle"></a>
                                <h3 class="media-heading">{{ ucfirst($fullview->user->name) }} <small>{{ ucfirst($fullview->user->location) }}</small></h3>
                                <span><strong>Skills: </strong></span>
                                <span class="label label-warning">HTML5/CSS</span>
                                <span class="label label-info">Adobe CS 5.5</span>
                                <span class="label label-info">Microsoft Office</span>
                                <span class="label label-success">Windows XP, Vista, 7</span>
                            </center>
                            <hr>
                            <div class="container">
                                <p class="text-success">Previous works</p>
                                <hr>
                                <div class="col-md-10 com-sm-10 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="#"><img src="{{ asset('assets/img/blog/author.jpg') }}" alt="" class="img-thumbnail img-responsive img-raised"></a><br>
                                            <a href="#"><small>{ Job Name }: Click to preview</small></a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"><img src="{{ asset('assets/img/blog/author.jpg') }}" alt="" class="img-thumbnail img-responsive img-raised"></a><br>
                                            <a href="#"><small>{ Job Name }: Click to preview</small></a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"><img src="{{ asset('assets/img/blog/author.jpg') }}" alt="" class="img-thumbnail img-responsive img-raised"></a><br>
                                            <a href="#"><small>{ Job Name }: Click to preview</small></a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"><img src="{{ asset('assets/img/blog/author.jpg') }}" alt="" class="img-thumbnail img-responsive img-raised"></a><br>
                                            <a href="#"><small>{ Job Name }: Click to preview</small></a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                        </div>
                        <div class="card-footer">
                            <center>
                                <button type="button" class="btn btn-common">good enough? Hire { Name }</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection