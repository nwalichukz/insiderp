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
                        <option >Politics</option>
                        <option >Education</option>
                        <option >Sports</option>
                        <option >Religion</option>
                        <option >Romance</option>
                        <option >Technology</option>
                        <option >Entertainment</option>
                        <option >Culture</option>
                        <option >Opinion</option>
                        <option >Travel</option>
                         <option >Betting</option>
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
                        <option >Literature</option>
                        <option >Art and Craft</option>
                        <option >Campus Gist</option>
                        <option >Food</option>

                    </select>
                </div>
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
                     <input type="text" name="image_caption" class="modal-input" placeholder="Enter the image(s) description or caption">
                   </div>
                <div class="modal-footer">
                    <button type="submit" class="modal-button">Post</button>
                </div>
                </form>

            </div>
        </div>
    </div>

@endsection