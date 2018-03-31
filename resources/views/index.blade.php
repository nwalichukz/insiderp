@extends('layouts.app')
@section('title')
Bido
@endsection

@section('content')
  @include('partials.header')

  @include('partials.category')

  @include('partials.featured')

<section class="section purchase" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row">
      <div class="section-content text-center">
        <h1 class="title-text">
          Have you got a skill?
        </h1>
        <p>Let us know what you can do, and earn cash for it!</p>
        <a href="{{ url('/register') }}" class="btn btn-common">Get Started Now</a>
      </div>
    </div>
  </div>
</section>
    
 @include('partials.footer')

@endsection