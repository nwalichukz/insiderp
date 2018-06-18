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
                                    Bido?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p>Bido is a community of artisans, professionals and generally skilled individuals. Bido intends to
                                promote excellence and creativity through pooling highly talented individuals on our platform who will be 
                                helping people get their job done perfectly and learning form one another on the platform.</p>
                                <br>
                                <p>
                                    .
                                </p>
                            </div>
                        </div>
                    </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    Our Mission
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>
                                   Bido intends to
                                promote excellent and creativity through pooling highly talented individuals on our platform who will be 
                                helping people get their job done perfectly and learning from one another on the platform. To achieve the above
                                mission we would do the following. We intend to run a people oriented business. We are most driven by passion 
                                to see talents been engaged to the good use in the society.</p>
                                <br>
                                <ol>
                                    <li>Innovation</li>
                                    <li>Constant Improvement</li>
                                    <li>People first business approach </li>
                                    <li>Forward thinking and simplicity approach to issues</li>

                                </ol>
                                <p> </p>
                            </div>
                        </div>
                    </div>
                   <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    Our vision?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>
                                    Bido want to become a leading force in providing skilled people and professionals
                                    a platform to market their skills !!!
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