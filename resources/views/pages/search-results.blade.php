@extends('layouts.app')
@section('title')
Job Offers | Biddo
@endsection

@section('content')

@include('partials.header2')
<section class="job-browse section">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8">
                @if($total_search > 0)
                    @foreach($search as $search)
                        <div class="job-list">
                            <div class="thumb">
                                <a href="job-details.html"><img src="assets/img/jobs/img-1.jpg" alt=""></a>
                            </div>
                            <div class="job-list-content">
                                <h4><a href="job-details.html">{{ $search->user->name }}</a></h4>
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
                    @endforeach
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