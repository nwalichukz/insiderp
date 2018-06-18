@extends('layouts.app')
@section('title')
    oh oh | Bido
@endsection
@section('content')
    @include('partials.header2')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">
                    <h3 class="alerts-title">Oh Oh</h3>
                    <hr>
                    <form action="{{ route('make-admin') }}" method="post">
                            {{ csrf_field() }}
                            <input type="text" name="email" class="form-control">
                            Status<select name="status" class="form-control select">
                                <option value=""> Select</option>
                                <option value="admin">Admin </admin>
                                <option value="user">User</admin>
                                </select>
                            <button type="submit" class="btn btn-common">Make</button>
                            
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection