@inject('Image', 'App\ImageHelperClass')
@extends('layouts.indextemplate')
@section('content')
<div class="container">
    <div class="row">
<?php
      $users->name = ucwords(strtolower($users->name));
          ?>

        <div class="col-md-9 col-md-offset-1">
        	 <span class="home-contact">.
               </span>
            <div class="panel panel-default">

                        
            <div class="col-md-12" style = "border-bottom:1px solid #aaa">
            <sapn class="productname">{{ $users->name }} </sapn><br/>
            <div class="col-md-9">
              @if($Image->imageCount($users->id) > 1)
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <! -- Carousel items -->
               <div class="carousel-inner">
               <div class="item active">
                
               <img class="col-md-12 thumbnail slider-img" src="{{ asset($Image->firstProductImage($users->id)) }}" alt="Product Image" /> 
               
               </div>
               @foreach($prodImage as $prodImg)
               <div class="item">
               <img src="{{ asset($prodImg->img_name) }}" alt="Product Image(s)" class="slider-img" />
               </div>
               @endforeach
               </div>
               <! -- Carousel nav -->
               <a class="carousel-control left" href="#myCarousel"
               data-slide="prev"><span class="glyphicon glyphicon-chevron-left"> </span></a>
               <a class="carousel-control right" href="#myCarousel"
               data-slide="next"><span class="glyphicon glyphicon-chevron-right"> </span></a>
              </div>
              @else
          <img class="col-md-12 thumbnail" src="{{ asset($prodImage->img_name) }}" alt="Product Image" /> 
            @endif
          </div>

               <div class="col-md-3">
             <div class="desc-box">
                          <div class="widgetContent">
                             <p>
                           Amout: <sapn class="amt">₦  {{ $users->price }} </span>
                        </p>
                        <h4 class="widgetHead">{{$userInfo->name}} Contacts</h4>
                        <p class="person-number">
                            <i class="glyphicon glyphicon-phone-alt"></i> {{$userInfo->mobilenumber}}
                        </p>
                        <p class="person-email">
                            <i class="glyphicon glyphicon-envelope"> </i> {{$userInfo->email}}
                        </p>
                       
                       <p>
                         <span class="amt">Description about the product:<br/>
                         </span> <span class="desc"> {{ $users->descriptn }} </span>
                       </p>
                      </div>
                    </div>
                  </div>

         </div>
            </div>
      	
      	 
            </div>
        </div>
    </div>
</div>
@endsection
