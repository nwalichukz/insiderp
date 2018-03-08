@extends('layouts.app')
@section('title')
Job Offers | Biddo
@endsection

@section('content')

@include('partials.header2')
<div class="page-header" style="background: url(assets/img/banner1.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Search Job</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}"><i class="ti-home"></i> Home</a></li>
                        <li class="current">{ Search Query }</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="job-browse section">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8">
                <div class="job-list">
                    <div class="thumb">
                        <a href="job-details.html"><img src="assets/img/jobs/img-1.jpg" alt=""></a>
                    </div>
                    <div class="job-list-content">
                        <h4><a href="job-details.html">{ Full Name }</a></h4>
                        <p>{ Short Bio }</p>
                        <div class="job-tag">
                            <div class="pull-left">
                                <div class="meta-tag">
                                    <span><a href=""><i class="ti-brush"></i>{ Job }</a></span>
                                    <span><i class="ti-location-pin"></i>{ Location }</span>
                                </div>
                            </div>
                            <div class="pull-right">
                                <div class="icon">
                                    <i class="ti-star"></i>
                                </div>
                                <div class="btn btn-common btn-rm">Hire</div>
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
        </div>
    </div>
</section>
@endsection