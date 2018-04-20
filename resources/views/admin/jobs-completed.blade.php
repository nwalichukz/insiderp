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
                    <!-- Users -->
                    <section id="Users">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Jobs Completed</h4>
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
                                                <td scope="row"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><a href="{{-- route('userDetails', ['user' => $user->id]) --}}"><i class="fa fa-angle-right"></i> Details</a></td>

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