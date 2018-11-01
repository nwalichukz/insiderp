@inject('Helper', 'App\HelperClass')
@extends('layouts.usertemplate')
@section('content')

      <div class="mt-16 flex justify-center px-3">
    <div class="w-full md:w-2/5 bg-white rounded">
        <div class="mb-2 border-b text-black capitalize text-xl py-3 px-4">Add User Image</div>
        <div class="px-4">
                <form action="{{url('add-user-image')}}" method="post" enctype="multipart/form-data">
    
                <div class="modal-body">
                    <!-- content goes here -->
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="attachment">Add image:</label>
                            <input type="file" name="avatar" onchange="readURL(this);" id="images" multiple="true" required/>
                            <div id="image-holder" class="w-full"></div>
                            <img class="showimg" src="#" alt="" class="rounded-full shadow" />
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="modal-button">Add Image</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    @endsection