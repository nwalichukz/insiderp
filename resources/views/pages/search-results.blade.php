@extends('layouts.app')
@section('title')
Search Results| Bido
@endsection

@section('content')

@include('partials.header2')
<section class="search-area">
    <div class="col-md-12">
        <div class="container">
            <form method="post" action="{{ route('search') }}">
                {{ csrf_field() }}
                <div class="controls col-md-12">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <input type="text" id="profession" name="profession_title" placeholder="Find Service  e.g Orange Lab" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <input type="text" id="location" name="location" placeholder="Enter location you want to find service" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="search-category-container">
                                <label class="styled-select">
                                    <select class="dropdown-product selectpicker" name="service_category" class="form-control">
                                        <option value="">Select Service Category</option>
                                        <option>Entertainment</option>
                                        <option>Business</option>
                                        <option>Education/Training</option>
                                        <option>Art/Design</option>
                                        <option>Events and Lifestyle</option>
                                        <option>Programming and IT</option>
                                        <option>Sewing and Makeups</option>
                                        <option>Repairs</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-6">
                            <button type="submit" class="btn btn-search-icon"><i class="ti-search"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<section class="featured-jobs section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                @if($total_search > 0)
                    <div class="row">
                        @foreach($search as $search_result)

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="featured-item">
                                    <div class="featured-wrap">
                                        <div class="featured-inner">
                                            <figure class="item-thumb">
                                                <a class="hover-effect" href="{{ action('interfaceController@fullView', ['id' => $search_result->id]) }}">
                                                    <img src="{{ asset("assets/img/features/img-1.jpg") }}" alt="">
                                                </a>
                                            </figure>
                                            <div class="item-body">
                                                <b class="name">{{ ucfirst($search_result->user->name) }}</b>
                                                <h3 class="job-title"><a href="{{ action('interfaceController@fullView', ['id' => $search_result->id]) }}">{{ $search_result->profession_title }}</a></h3>
                                                <div class="adderess"><i class="ti-location-pin"></i> {{ $search_result->location }}, {{ $search_result->user->state }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-foot">
                                        <span><i class="ti-calendar"></i> {{ $search_result->created_at->diffForHumans() }}</span>
                                        <div class="view-iocn">
                                            <a href=""><i class="ti-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="col-md-6 col-md-offset-4">
                        <h1>No result found</h1>
                    </div>
                @endif

                <ul class="pagination">
                    {{ $search->links() }}
                </ul>

            </div>
        </div>
    </div>
</section>
@endsection