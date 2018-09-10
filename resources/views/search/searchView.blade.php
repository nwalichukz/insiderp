@inject('Image', 'App\ImageHelperClass')
@extends('layouts.indextemplate')
@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
        	 
            <div class="panel panel-default">
       @if(!empty($users))
            @foreach($users as $userdata)
           <?php
             $userdata->name = ucwords(strtolower($userdata->name));
             ?>
            <div class="col-md-3" style = "border-bottom:1px solid #aaa, font-weight:bold">
            <sapn class="productname">{{ $userdata->name }} </sapn>
            
            <a href="gotoFullView/{{$userdata->id}}/{{$userdata->user_id}}" class=""><img class="center-block img thumbnail" src="{{ $Image->firstProductImage($userdata->id)->img_name }}" 
            	alt="Product Images"></a> 
           
            <sapn class="amt">₦  {{ $userdata->price }}</span>
            </div>
      	@endforeach
	
      	 
            </div>
        </div>
    </div>
</div>
			 <div class="pgnate center-block">
                   {!! $users->render() !!}
                 </div>
    @else
    <div>
      <p> Ah... Products not found, search for another product name </p>
    </div>
   @endif
@endsection