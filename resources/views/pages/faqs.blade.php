@extends('layouts.app')
@section('title')
{{ $title }}
@endsection
@section('content')
@include('partials.header2')
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    How do I place an ad?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p>To place ads of any category just contact us and be directed on what to do. </p>
                                <br>
                                
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    Who should I to contact if I have any question?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Please get to us through ous contact or support page.

                                      </p>
                                      <p>You can call: 07065119492 </p>
                                      <p>Email us on: askbido@gmail.com </p>
                                
                            
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    Who can register?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>
                                    Any body living in Nigeria with a skill that you think people need.
                                </p>
                            </div>
                        </div>
                    </div>
                   
                </div>

            </div>
        </div>
    </div>
</div>

@include('partials.footer')
@endsection