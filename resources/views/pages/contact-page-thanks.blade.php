@extends('layouts.indextemplate')
@section('content')
    <div class="mt-6 flex justify-center">
        <div class="w-1/2 bg-white rounded shadow p-4">
            <div class="container mx-auto">
                <div class="mb-3 border-b">
                    <h3 class="modal-title">Email Reset Successfully</h3>
                </div>
                <p class="text-center text-xl">A reset password has been sent to your email address please check your mail.</p>

                <div class="modal-footer">
                    <a style="color:#2F4F4F;" href="{{url('/')}}" title="click to go back to bido home page"><button>continue </button></a>
                </div>
            </div>
        </div>
    </div>
    @endsection