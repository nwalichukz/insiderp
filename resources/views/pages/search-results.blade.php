@extends('layouts.app')
@section('title')
Search Results| Biddo
@endsection

@section('content')

@include('partials.header2')
<section class="search-area">
    <div class="container">
        <form method="post" action="{{ route('search') }}">
            {{ csrf_field() }}
            <div class="controls">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <input type="text" id="profession" name="profession_title" placeholder="Profession you are looking for" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <input type="text" id="location" name="location" placeholder="state / city / province" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="search-category-container">
                            <label class="styled-select">
                                <select class="dropdown-product selectpicker" name="service_category">
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
        <div class="col-md-6">
            <h1 class="heading">We found <b class="text-danger">{{ $total_search }}</b> person(s)</h1>
            <hr>
        </div>
    </div>
</section>
<section class="job-browse section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                @if($total_search > 0)
                    <div class="row">
                        @foreach($search as $search_result)
                            <div class="col-md-6">
                                <div class="job-list">
                                    <div class="thumb">
                                        <a href="{{ action('interfaceController@fullView',['id'=> $search_result->user->id]) }}"><img src="assets/img/jobs/img-1.jpg" alt=""></a>
                                    </div>
                                    <div class="job-list-content">
                                        <h4><a href="{{ action('interfaceController@fullView',['id'=> $search_result->user->id]) }}">{{ ucfirst($search_result->user->name) }}</a></h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>{{ ucfirst($search_result->name) }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="pull-right">N{{ $search_result->amount }}</p>
                                            </div>
                                        </div>
                                        <div class="job-tag">
                                            <div class="pull-left">
                                                <div class="meta-tag">
                                                    <span><a href=""><i class="ti-brush"></i>{{ ucfirst($search_result->profession_title) }}</a></span>
                                                    <span><i class="ti-location-pin"></i>{{ ucfirst($search_result->location) }}</span>
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
                            </div>
                        @endforeach
                    </div>
                @else
                    <h1>No result found</h1>
                @endif

                <ul class="pagination">
                    {{ $search->links() }}
                </ul>

            </div>
        </div>
    </div>
</section>
@endsection