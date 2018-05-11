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
                                <p>Bido is a community of artisans, professionals and generally skilled individuals. Bido intends is to
                                promote excellent and creativity through pooling highly talented individuals on our platform who will be 
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
                                   Bido intends is to
                                promote excellent and creativity through pooling highly talented individuals on our platform who will be 
                                helping people get their job done perfectly and learning form one another on the platform. To achieve the above
                                mission we would do the following </p>
                                <br>
                                <ol>
                                    <li>Innovation</li>
                                    <li>Constant Improvement</li>
                                    <li>People first business approach </li>

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
                                    We wnat to become a leading force in providing this kind of services !!!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                    How can I Return A Product?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute. non cupidatat skateboard dolor brunch. Foosd truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt alqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                </p>
                                <br>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident iure ab nisi, magnam vitae. Laboriosam laborum suscipit recusandae officia laudantium, consectetur adipisci voluptates doloremque quisquam. Id rerum iusto reprehenderit assumenda!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                                    How Long will it take to get my package?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute. non cupidatat skateboard dolor brunch. Foosd truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt alqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6">

                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne1">
                                    How do I place an ad?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur sit amet ante nec vulputate. Nulla aliquam, justo auctor consequat tincidunt, arcu erat mattis lorem, lacinia lacinia dui enim at eros. Pellentesque ut gravida augue. Duis ac dictum tellus </p>
                                <br>
                                <p>
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute. non cupidatat skateboard dolor brunch. Foosd truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt alqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim ke ffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo2">
                                    Who shouldi to contact if i Have any question?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo2" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute. non cupidatat skateboard dolor brunch. Foosd truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt alqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim ke ffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                </p>
                                <br>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur sit amet ante nec vulputate. Nulla aliquam, justo auctor consequat tincidunt, arcu erat mattis lorem, lacinia lacinia dui enim at eros. Pellentesque ut gravida augue. Duis ac dictum tellus </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree3">
                                    How can i cancel or change my order?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree3" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas expedita, repellendus est nemo cum quibusdam optio, voluptate hic a tempora facere, nihil non itaque alias similique quas quam odit consequatur.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour4">
                                    How can i Return A Product?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour4" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute. non cupidatat skateboard dolor brunch. Foosd truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt alqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                </p>
                                <br>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident iure ab nisi, magnam vitae. Laboriosam laborum suscipit recusandae officia laudantium, consectetur adipisci voluptates doloremque quisquam. Id rerum iusto reprehenderit assumenda!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive5">
                                    How Long will it take to get my package?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFive5" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute. non cupidatat skateboard dolor brunch. Foosd truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt alqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
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