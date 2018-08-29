@extends('layouts.indextemplate')
@section('content')
 <div role="dialog" aria-labelledby="modalLabel" style="margin-top: 38px;">
        <div class="modal-dialog">
            <div class="modal-content" style="padding:10px;">
                <div class="modal-header">
           <h3 class="modal-title" id="lineModalLabel">Account Created Successfully</h3>
                </div>
               <p style="text-align:justify; font-size:1.2em;">Account created successfully. Thanks for joining us. Enjoy !!!</p>
              
                 <div class="modal-footer">  
                <a style="color:#2F4F4F;" href="{{url('/login')}}" title="click to go back to bido home page"><button>continue </button></a>
                <br/>
                </div>
            </div>
        </div>
    </div>
    @endsection