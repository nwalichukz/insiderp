@extends('layouts.app')
@section('title')
    Admin | Dashboard
@endsection

@section('content')
    @include('partials.header2')

    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    @include('admin.sidebar')
                </div>
                <div class="col-md-8 col-sm-8 com-xs-12">
                    <!-- ACTIONS -->
                    <section id="actions" class="py-4 mb-4 bg-faded">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addPostModal"><i class="fa fa-plus"></i> Add Vendor</a>
                                </div>
                                <div class="col-md-3">
                                    <a href="#" class="btn btn-warning btn-block" data-toggle="modal" data-target="#addUserModal"><i class="fa fa-plus"></i> Add User</a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <hr>
                    <br>
                    <!-- Users -->
                    <section id="Users">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>All Users</h4>
                                        </div>
                                        <table class="table table-striped">
                                            <thead class="thead-inverse">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Gender</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td scope="row">1</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><a href=""><i class="fa fa-angle-right"></i> Details</a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection