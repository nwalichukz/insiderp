@extends('layouts.indextemplate')
@section('content')
 <div role="dialog" aria-labelledby="modalLabel" style="margin-top: 38px;">
        <div class="modal-dialog">
            <div class="modal-content" style="padding:10px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="lineModalLabel">Reset password</h3>
                </div>
                <form action="{{URL('reset-password')}}" method="post" enctype="multipart/form-data" id="">
                    <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Enter your emaiil address">
                </div>
               
                <div class="modal-footer">
                    
                    <button type="submit" class="pull-left btn btn-common">Reset</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @endsection