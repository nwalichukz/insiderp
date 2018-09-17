@extends('layouts.indextemplate')
@section('content')
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <div id="conten" style="margin-top: 38px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 center-block">

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
                                    <p>A social tool that allow users post news, opinions, articles, questions and get involved in discussing
                                        those issues that affect us and our society especially in Nigeria A user generated content
                                        platform that is moderated. This platform is targeted at encoraging national discussion and conversation especially
                                        among the youths.</p>
                                    <br>
                                    <p>

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
                                        To create an environment that will encourage discussion of issues in our society. Our main focus is
                                        to spark important discussions in the society among the youths. To encourage Nigerian youths to engage in
                                        social discussions about issues in Nigeria. To achieve
                                        this we would be engaging our business through the following:
                                    </p>
                                    <br>
                                    <ol>
                                        <li>Innovation</li>
                                        <li>Excellence</li>
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
                                        To build an institution that promotes discussion about issues in our society
                                        and encourage people to take responsibility towards addressing them.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection