@inject('Helper', 'App\HelperClass')
@extends('layouts.usertemplate')
@section('content')
<div class="mt-16 flex justify-center px-3">
    <div class="w-full md:w-2/5 bg-white rounded">
        <div class="mb-2 border-b text-black capitalize text-xl py-3 px-4">{{ $data->title }}</div>
        <div class="px-4">
            <form action="{{url('update-post')}}" method="post" enctype="multipart/form-data" id="">
                <div class="mb-3">
                    <input type="text" name="title" class="modal-input" value="{{$data->title}}" required>
                    <input type="hidden" name="id"  value="{{$data->id}}" required>
                </div>
                <div class="mb-3">
                    <textarea name="post" id="textPost" class="modal-input" placeholder="Share your thought on anything you care about" required>{{$data->post}}</textarea>
                </div>

                <div class="mb-3">
                    <select name="category" class="modal-select" required>
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
                        <option >Opinion</option>
                        <option >Tourism</option>
                        <option >Job</option>
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
                        <option >Literature Review</option>
                        <option >Art and Craft</option>
                        <option >Campus Gist</option>
                    </select>
                </div>

                @if(Auth::check() && Auth::user()->user_level === 'admin')
                    <div class="mb-3">
                        <select name="post_importance" class="modal-select" required>
                            <option value="{{$data->post_importance}}">{{$data->post_importance}}</option>
                            <option value="normal" >Normal</option>
                            <option value="lead" >Lead</option>
                            <option value ="front-page">Front Page</option>
                            <option value="featured" >Featured</option>
                        </select>
                    </div>
                    {{--<div class="mb-3">
                        <select name="voting_status" class="modal-select">
                            <option value="{{$data->voting_status}}">{{$data->voting_status}}</option>
                            <option >open</option>
                            <option >closed</option>
                        </select>
                    </div>--}}
                @endif
                 @if(Auth::check() && Auth::user()->user_level === 'editor')
                    <div class="mb-3">
                        <select name="post_importance" class="modal-select" required>
                            <option value="{{$data->post_importance}}">{{$data->post_importance}}</option>
                            <option value ="front-page">Front Page</option>
                        </select>
                    </div>
                @endif
                <div class="modal-body">
                    <!-- content goes here -->
                    {{ csrf_field() }}
                    <div class="">
                            <label for="attachment">Add image:</label>
                            <input type="file" name="image[]" onchange="readURL(this);" id="images" multiple="true" class="p-1 bg-white text-black" />
                            <div id="image-holder" class="w-full"></div>
                            <img class="showimg" src="#" alt="" class="rounded shadow" />
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="modal-button">Done editing</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection