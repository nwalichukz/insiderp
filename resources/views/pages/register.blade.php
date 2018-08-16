@extends('layouts.indextemplate')
@section('content')

  <div role="dialog" aria-labelledby="modalLabel" style="margin-top: 38px;">
        <div class="modal-dialog">
            <div class="modal-content" style="padding:10px;">
                <div class="modal-header">

                    <h3 class="modal-title" id="lineModalLabel">Signup</h3>
                </div>
                <form action="{{url('register-user')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                </div>
                <div class="form-group">

                    <input type="text" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
                 <div class="form-group">
                    <input type="text" name="user_name" onkeyup="checkUnique();" id="user-name" class="form-control" placeholder="Enter a user name must be unique" required>
                    <div id="content" class="col-md-12"> </div>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter password min of 6 characters" required>
                </div>
                 <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Re-type the password above" required>
                </div>
               
                <div class="modal-footer">
                    <button type="submit" class="pull-left btn btn-common">Signup</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
