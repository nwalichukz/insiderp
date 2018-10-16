@extends('layouts.indextemplate')
@section('content')
    <div class="mt-20 flex justify-center">
        <div class="w-1/2 bg-white rounded shadow p-4">
            <div class="container mx-auto">
                <div class="mb-3 border-b">
                    <h3 class="modal-title">Contact sent successfully</h3>
                </div>
                <p class="text-center text-xl">Thank you for contacting us. We would get back to you soon !!!</p>

                <div class="modal-footer">
                    <a style="color:#2F4F4F;" href="{{url('/')}}" title="click to go back to bido home page"><button>continue </button></a>
                </div>
            </div>
        </div>
    </div>
    @endsection