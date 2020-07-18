@inject('Helper', 'App\HelperClass')
@extends('layouts.usertemplate')
@section('content')
<div class="mt-16 flex justify-center px-3">
    <div class="w-full md:w-2/5 bg-white rounded">
        <div class="mb-2 border-b text-black capitalize text-xl py-3 px-4">Add Post</div>
        <div class="px-4">
           <form action="{{url('add-post')}}" method="post" enctype="multipart/form-data" id="">
                
                    <div class="mb-3">
                        <input type="text" name="title" class="modal-input" placeholder="Enter the title of the post max of ten words" required>
                    </div>
                    
                    <div class="mb-3">
                    <textarea name="post" rows="3" id="textPost" class="modal-input" placeholder="Share your thought on anything you care about" required></textarea>
                </div>
                
                     <div class="mb-3">
                    <select name="category" class="modal-select">
                        <option value="">Select Category</option>
                        @if(!empty($Helper->category()))
									@foreach($Helper->category() as $cat)
                                    <option >{{$cat->name}}</option>
									@endforeach
									@endif

                       
                      
                    </select>
                </div>
                @if(Auth::check() && Auth::user()->user_level === 'admin')
                    <div class="mb-3">
                        <select name="post_importance" class="modal-select" required>
                           <option value="latest" >Normal</option>
                            <option value="lead" >Lead story</option>
                            <option value ="side-lead">Side Lead</option>
                            <option value="opinion-index" >Opinion Index</option>
                           
                        </select>
                    </div>
                    <div class="mb-3">
                        Fill this if the publishing is for a guest writer
                        <input type="text" name="guest_name" class="modal-input" placeholder="Enter guest writer's name (optional)">
                    </div>
                    <div class="mb-3">
                    <textarea name="guest_description" rows="3" id="" class="modal-input" placeholder="Enter the description of the guest (optional)"></textarea>
                </div>
                    {{--<div class="mb-3">
                        <select name="voting_status" class="modal-select">
                            <option value="{{$data->voting_status}}">{{$data->voting_status}}</option>
                            <option >open</option>
                            <option >closed</option>
                        </select>
                    </div>--}}
                @endif
                <div class="modal-body">
                    <!-- content goes here -->
                        {{ csrf_field() }}
                        <div class="">
                            <label for="attachment">Add image:</label>
                            <input type="file" name="image[]" onchange="readURL(this);" id="images" multiple="true" class="p-1 bg-white text-black" />
                            <div id="image-holder" class="w-full"></div>

                        </div>
                </div>
                <div id="imgcaption" class="mb-3">
                     <textarea name="image_caption" rows="3" id="" class="modal-input" placeholder="Enter the image(s) description or caption"></textarea>
                    
                   </div>
                <div class="modal-footer">
                    <button type="submit" class="modal-button">Post</button>
                </div>
                </form>

            </div>
        </div>
    </div>

@endsection