@extends('layouts.app')
@section('title')
Biddo
@endsection

@section('content')
    @include('partials.header')
    <div class="clearfix"></div>

    @include('partials.banner')
    @include('partials.category')

    <!-- Testimonials -->
<div id="testimonials">
    <!-- Slider -->
    <div class="container">
        <div class="sixteen columns">
            <div class="testimonials-slider">
                  <ul class="slides">
                    <li>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aut soluta rem accusamus nostrum laborum placeat molestiae officia inventore quidem!
                      <span>Collis Ta’eed, Envato</span></p>
                    </li>

                    <li>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo reiciendis consequatur nostrum, optio ullam eius inventore iste, esse dolorum? Ullam.
                      <span>John Doe</span></p>
                    </li>
                    
                    <li>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem quod inventore voluptatem nisi sunt dicta, vel velit! Maiores, voluptatum, laudantium!
                      <span>Tom Smith</span></p>
                    </li>

                  </ul>
            </div>
        </div>
    </div>
</div>


<!-- Infobox -->
<div class="infobox">
    <div class="container">
        <div class="sixteen columns">Start Building Your Own Job Board Now <a href="my-account.html">Get Started</a></div>
    </div>
</div>

@include('partials.footer')


@endsection