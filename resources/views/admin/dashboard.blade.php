@extends('layouts.app')
@section('title')
    Admin | Dashboard
@endsection

@section('content')
    @include('partials.header2')

    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-9 col-xs-12">
                    @include('admin.sidebar')
                </div>
                <div class="col-md-9 col-sm-9 com-xs-12">
                    <!-- ACTIONS -->
                    <section id="actions" class="py-4 mb-4 bg-faded">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10">
                                    <form action="">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="search" placeholder="Search with id,  Name, phone... ">
                                                </div>
                                            </div>
                                            <div class="col-md-1 col-sm-6">
                                                <button type="submit" class="btn btn-search-icon"><i class="ti-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="#" class="btn btn-common btn-block" data-toggle="modal" data-target="#addUserModal"><i class="fa fa-plus"></i> Add User</a>
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
                                                <th>id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Gender</th>
                                                <th>Date registered</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $user)
                                           
                                            <tr>
                                                
                                                <td scope="row">
                                                <a href="{{ route('userDetails', ['user' => $user->id]) }}">
                                                {{ $user->id }} </a></td> 
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->gender }}</td>
                                                <td>{{$user->created_at->diffForHumans()}}</td>
                                               
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