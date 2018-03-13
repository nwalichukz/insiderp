@extends('layouts.app')

@section('title')
    Dashboard | welcome
@endsection

@section('content')
    @include('partials.header2')
    <div id="content">
        <!-- ACTIONS -->
        <section id="actions" class="py-4 mb-4 bg-faded">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 mr-auto">
                        <a href="" ><i class="fa fa-arrow-left"></i> Back To Dashboard</a>
                    </div>

                    <div class="col-md-3">
                        <a href="" class="btn btn-success btn-block"><i class="fa fa-check"></i> Save Changes</a>
                    </div>
                    <div class="col-md-3">
                        <a href="" class="btn btn-danger btn-block"><i class="fa fa-remove"></i> Delete User</a>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <br>

        <!-- POST EDIT -->
        <section id="edit-post">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="panel panel-info">
                            <div class="panel-header">
                                <h4>{ Full Name }</h4>
                            </div>
                            <div class="panel-body">
                                <form>
                                    <div class="form-group">
                                        <label for="title" class="form-control-label">Full Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Full Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="category" class="form-control-label">Email Address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email Address">
                                    </div>
                                    <div class="form-group bg-faded p-3">
                                        <label for="Phone">Phone Number</label>
                                        <input type="text" name="phone_no" class="form-control" placeholder="Phone Number">
                                    </div>
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <input type="text" name="state" class="form-control" placeholder="State">
                                    </div>
                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <input type="text" name="location" class="form-control" placeholder="Location">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
