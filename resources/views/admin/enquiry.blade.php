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
                                            <h4>Enquiry</h4>
                                        </div>
                                        <table class="table table-striped">
                                            <thead class="thead-inverse">
                                            <tr>
                                                <th>Delete</th>
                                                <th>id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone no.</th>
                                                <th>Message</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($enquiries as $enquiry)
                                            <tr>
                                                <td title="delete message">
                                                    <a href="{{ url('/delete-enquiry/'.$enquiry->id) }}">
                                                        <i class="fa fa-close"></i> </a></td>
                                                <td scope="row">{{$enquiry->id}}</td>
                                                <td> {{$enquiry->name}}</td>
                                                <td>{{$enquiry->email}}</td>
                                                <td>{{$enquiry->phone_no}}</td>
                                                <td><a href="{{ url('/get-enquiry/'.$enquiry->id) }}">{{$enquiry->message}}</a></td>

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