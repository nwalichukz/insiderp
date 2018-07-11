@extends('layouts.indextemplate')
@section('content')
 <div>
        <div class="modal-dialog">
            <div class="modal-content" style="padding:10px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="lineModalLabel">Login</h3>
                </div>
                <form action="{{url('/post-login')}}" method="post" enctype="multipart/form-data">
                     {{ csrf_field() }}
                    <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Enter emaiil addrss">
                </div>
                <div class="form-group">

                    <input type="password" name="password" class="form-control" placeholder="Enter password">
                </div>
               
                <div class="modal-footer">
                    <a href="{{url('/forgot-password')}}">Forgot password </a>
                    <button type="submit" class="pull-left btn btn-common">Login</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @endsection