@inject('Helper', 'App\HelperClass')
@extends('layouts.usertemplate')
@section('content')
  <div class="mt-14 flex justify-center">
      <div class="w-2/5 bg-white rounded">
          <div class="mb-2 border-b text-black capitalize text-xl py-3 px-4">add option</div>
          <div class="px-4">
              <form action="{{url('post-option')}}" method="post" enctype="multipart/form-data">

                  <div class="mb-3">
                      <input type="hidden" name="id" value="{{$post_id}}" required>
                      <input type="text" name="name" class="modal-input" placeholder="Enter the name of the option" required>
                  </div>

                  <div class="mb-3">
                      <textarea name="description" rows="3" class="modal-input" placeholder="write something about this option" required></textarea>
                  </div>

                  <div class="modal-body">
                      <!-- content goes here -->
                      {{ csrf_field() }}
                      <div class="mb-3">
                          <label for="attachment">Add option with image:</label>
                          <input type="file" name="image" onchange="readURL(this);" id="images" multiple="true" />
                          <div id="image-holder" class="col-md-12"></div>
                          <img class="showimg" src="#" alt="" class="shadow rounded" />
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="modal-button">Add</button>
                  </div>
              </form>
          </div>
      </div>
    </div>
@endsection