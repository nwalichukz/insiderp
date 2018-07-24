@inject('Helper', 'App\HelperClass')
@extends('layouts.usertemplate')
@section('content')
  <div class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="padding:10px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="lineModalLabel">Add Option</h3>
                </div>
                <form action="{{url('add-option')}}" method="post" enctype="multipart/form-data" id="">
                
                    <div class="form-group">
                       <input type="hidden" name="id" value="{{$post_id}}" required>
                        <input type="text" name="name" class="form-control" placeholder="Enter the name of the option" required>
                    </div>
                    
                    <div class="form-group">
                    <textarea name="description" rows="3" class="form-control" placeholder="description" ></textarea>
                </div>
                    
                <div class="modal-body">
                    <!-- content goes here -->
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="attachment">Add option with image:</label>
                            <input type="file" name="image" onchange="readURL(this);" id="images" multiple="true" />
                            <div id="image-holder" class="col-md-12"></div>
                            <img class="showimg" src="#" alt="" /> 
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="pull-left btn btn-common">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection