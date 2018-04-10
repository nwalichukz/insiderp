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
                                                @if(!empty($search_result->logo->logo))
                                                <a class="hover-effect" href="{{ action('interfaceController@fullView', ['id' => $search_result->id]) }}">
                                                    <img src="{{ asset("images/user/".$search_result->logo->logo) }}" alt="logo image">
                                                </a>
                                                @elseif(!empty($search_result->avater->avater))
                                                <a class="hover-effect" href="{{ action('interfaceController@fullView', ['id' => $search_result->id]) }}">
                                                    <img src="{{ asset("images/user/".$search_result->avater->avater) }}" alt="logo image">
                                                </a>
                                                @else
                                                <a class="hover-effect" href="{{ action('interfaceController@fullView', ['id' => $search_result->id]) }}">
                                                    <img src="{{ asset("assets/img/features/img-1.jpg") }}" alt="">
                                                </a>
                                                @endif
                                            </figure>
                                            <?php
                                                $search_result->profession_title = substr(ucwords(strtolower($search_result->profession_title)), 0, 23);
                                                $search_result->name = substr($search_result->name, 0, 23);
                                                     /** 
                                                     *  converts the string to lower case and the string first 
                                                     *  character is made capital letter.
                                                     *  then fetches 140 character from the string.
                                                     */
                                                $search_result->description = substr(ucfirst(strtolower($search_result->description)), 0, 60);
                                               ?>
                                            <div class="item-body">
                                               <h3> <b class="job-title"><a href="{{ action('interfaceController@fullView', ['id' => $search_result->id]) }}">{{ ucfirst($search_result->name) }}</a></b> </h3>

                                                <span class="name">{{ $search_result->profession_title }}</a></span>
                                                 
                                                <div class="adderess">{{$search_result->description}}...</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-foot">
                                        <span class="pull-right"><i class="ti-calendar"></i> {{ $search_result->created_at->diffForHumans() }}</span>
                                        <span ><i class="ti-location-pin"></i> {{ $search_result->location }}, {{ $search_result->user->state }}</span>
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
                        <h3>No result found</h3>
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