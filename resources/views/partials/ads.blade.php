<div class="row">
			@foreach($homeads as $search_result)

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="featured-item">
                                    <div class="featured-wrap">
                                        <div class="featured-inner">
                                            <figure class="item-thumb">
                                                @if(!empty($search_result->user->avater->avater))
                                                <a class="hover-effect" href="{{ action('interfaceController@fullView', ['id' => $search_result->id]) }}">
                                                    <img src="{{ asset("images/user/".$search_result->user->avater->avater) }}" alt="logo image">
                                                </a>
                                                @else
                                                <a class="hover-effect" href="{{ action('interfaceController@fullView', ['id' => $search_result->id]) }}">
                                                    <img src="{{ asset("images/logo/logo.png") }}" alt="">
                                                </a>
                                                @endif
                                            </figure>
                                            <div class="item-body">
                                               <h3>
                                                   <b class="job-title">
                                                       <a href="{{ action('interfaceController@fullView', ['id' => $search_result->id]) }}">
                                                           {{ substr($search_result->name, 0, 23) }}
                                                       </a>
                                                   </b>
                                                   <sub class="pull-right">{{ $search_result->user->phone_no }}</sub>
                                               </h3>

                                                <span class="name">{{ substr(ucwords(strtolower($search_result->profession_title)), 0, 23) }}</span>
                                                 
                                                <div class="adderess">{{ substr(ucfirst(strtolower($search_result->description)), 0, 60) }}...</div>
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