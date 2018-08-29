@extends('layouts.indextemplate')
@section('content')
 <div role="dialog" aria-labelledby="modalLabel" style="margin-top: 38px;">
        <div class="modal-dialog">
            <div class="modal-content" style="padding:10px;">
                <div class="modal-header">
           <h3 class="modal-title" id="lineModalLabel">Email Reset Successfully</h3>
                </div>
               <p style="text-align:justify; font-size:1.2em;">A reset password has been sent to your email address please check your mail.</p>
                 <div class="modal-footer">  
                <br/>
                </div>
            </div>
        </div>
    </div>
    @endsection