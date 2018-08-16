@extends('layouts.indextemplate')
@section('content')
 <div role="dialog" aria-labelledby="modalLabel" style="margin-top: 38px;">
        <div class="modal-dialog">
            <div class="modal-content" style="padding:10px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"></span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="lineModalLabel">Account not active</h3>
                </div>
               <p style="text-align:justify; font-size:1.2em;">Your account has been temporarily suspended for our terms violations. Please you can contact the 
                admin at askbido@gmail.com or you make a complaint through our contact page. Thanks.</p>
                 <div class="modal-footer">  
                <br/>
                </div>
            </div>
        </div>
    </div>
    @endsection