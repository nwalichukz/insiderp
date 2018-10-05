@extends('layouts.indextemplate')
@section('content')
<<<<<<< HEAD
<div class="mt-16 flex justify-center">
    <div class="w-full md:w-2/5 bg-white rounded shadow p-4">
=======
<br><br>
<div class="mt-6 flex justify-center">
    <div class="w-1/2 bg-white rounded shadow p-4">
>>>>>>> 365e449deeed3b6f38e295f914c725082b17733c
        <div class="container mx-auto">
            <div class="mb-3 border-b">
                <h3 class="modal-title">Account Created Successfully</h3>
            </div>
            <p class="text-center text-xl mb-3">Account created successfully. Thanks for joining us. Enjoy !!!</p>

            <div class="modal-footer text-white">
                <a class="modal-button" href="{{url('/login')}}" title="click to go back to bido home page"><button>continue </button></a>
                <br/>
            </div>
        </div>
    </div>
</div>
<br>
@endsection