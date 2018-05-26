@extends('layouts.app')
@section('title')
    Admin | Dashboard
@endsection

@section('content')
    @include('partials.header2')

    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    @include('admin.sidebar')
                </div>
                <div class="col-md-8 col-sm-8 com-xs-12">
                    <!-- ACTIONS -->
                    <section id="actions" class="py-4 mb-4 bg-faded">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10">
                                    <form action="">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="search" placeholder="Search with id,  vendor Name,  Profession Title... ">
                                                </div>
                                            </div>
                                            <div class="col-md-1 col-sm-6">
                                                <button type="submit" class="btn btn-search-icon"><i class="ti-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="#" class="btn btn-common btn-block" data-toggle="modal" data-target="#addVendorModal"><i class="fa fa-plus"></i> Add Vendor</a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <br>
                    <!-- Users -->
                    <section id="Users">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Vendors</h4>
                                        </div>
                                        <table class="table table-striped">
                                            <thead class="thead-inverse">
                                            <tr>
                                                <th>#</th>
                                                <th>Vendor Name</th>
                                                <th>Profession Title</th>
                                                <th>Location</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($vendors as $vendor)
                                            <tr>
                                                
                                                    <td scope="row">{{ $vendor->id }}</td>
                                                    <td>{{ $vendor->name }}</td>
                                                    <td>{{ $vendor->profession_title }}</td>
                                                    <td>{{ $vendor->location }}</td>
                                                    <td><a href="{{ url('service/edit', $vendor->id) }}">
                                                        <i class="fa fa-angle-right"></i> Details</a></td>
                                                
                                            </tr>
                                            @endforeach
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