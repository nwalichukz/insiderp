@extends('layouts.app')
@section('title')
    {{ $service->name }} | Bido
@endsection
@section('content')
    @include('partials.header2')

    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12">
                    @include('partials.sidebar')
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">

                </div>
            </div>
        </div>
    </div>
@endsection