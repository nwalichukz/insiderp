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
                <a style="color:#2F4F4F;" href="{{url('/')}}" title="click to go back to bido home page"><button>continue </button></a>
                <br/>
                </div>
            </div>
        </div>
    </div>
    @endsection