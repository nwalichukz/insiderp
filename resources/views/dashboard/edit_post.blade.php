@inject('Helper', 'App\HelperClass')
@extends('layouts.usertemplate')
@section('content')
<div class="col-md-7 col-lg-7" id="centerDiv">
		<div class="item-wrap">
			<!-- yes oh here start loop -->
      
    <div class="moda ade" id="" tabindex="" role="dilog" aria-labelledby="modlLabel">
        <div class="modal-dialog">
            <div class="modal-content" style="padding:10px;">
                <div class="modal-header">
                    <h3 class="modal-title" id="lineModalLabel">Edit Post</h3>
                </div>
                <form action="{{url('update-post')}}" method="post" enctype="multipart/form-data" id="">
                
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" value="{{$data->title}}" required>
                         <input type="hidden" name="id"  value="{{$data->id}}" required>
                    </div>
                    
                    <div class="form-group">
                    <textarea name="post" rows="3" class="form-control" placeholder="Share your thought on anything you care about" max:"350" required>{{$data->post}}</textarea>
                </div>
                @if(Auth::check() && Auth::user()->user_level === 'admin')
                     <div class="form-group">
                    <select name="category" class="form-control" required>
                        <option value="{{$data->category}}">{{$data->category}}</option>
                        <option >Politics</option>
                        <option >Education</option>
                        <option >Sports</option>
                        <option >Religion</option>
                        <option >Romance</option>
                        <option >Technology</option>
                        <option >Entertainment</option>
                        <option >Culture</option>
                        <option >Travel</option>
                         <option >Betting</option>
                         <option >Tourism</option>
                          <option >Jobs</option>
                          <option >NYSC</option>
                         <option >Jokes</option>
                         <option >Foreign</option>
                         <option >Events</option>
                         <option >Fashion</option>
                         <option >Birthdays</option>
                         <option >CarTalk</option>
                        <option >Entrepreneurship</option>
                         <option >Health</option>
                        <option >Travel</option>
                    </select>
                </div>
                @endif
                <div class="form-group">
                    <select name="post_importance" class="form-control" required>
                        <option value="{{$data->post_importance}}">{{$data->post_importance}}</option>
                        <option >Normal</option>
                        <option >Lead</option>
                        <option >Votes</option>
                        <option >Predictions</option>
                    </select>
                </div>
                <div class="modal-body">
                    <!-- content goes here -->
                        {{ csrf_field() }}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="pull-left btn btn-common">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
        </div>  
</div>
@endsection