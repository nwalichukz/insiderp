@inject('Image', 'App\ImageHelperClass')
@extends('layouts.usertemplate')
@section('content')
<div class="container">
    <div class="">
        <div class="col-md-9 col-md-offset-1">
            <div class="panel panel-default">
            <div class="">
                @if(!empty($postItem)) {{ $postItem }} @endif
            @foreach($users as $userdata)
            <?php
             $userdata->name = ucwords(strtolower($userdata->name));
             ?>
            <div class="col-md-3" style = "border-bottom:1px solid #aaa">
            <sapn class="productname">{{ $userdata->name }} </sapn>
            
            <a href="" class=""><img class="img thumbnail" src="{{ $Image->firstProductImage($userdata->id)->img_name }}" 
            	alt="Product Images"></a> 
           
            <sapn class="amt">₦  {{ $userdata->price }}</span><br/>
                 <a title="click to edit this product" href="editProduct/{{$userdata->id}}">Edit</a> |  <a title="click to delete this product" href="deleteProduct/{{$userdata->id}}">Delete</a>
            </div>

      	@endforeach
      	 
            </div>
            </div>
        </div>
    </div>
</div>
            <div class="pgnate center-block">
             {!! $users->render() !!}
             </div>

@endsection