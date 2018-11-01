@inject('Helper', 'App\HelperClass')
@extends('layouts.usertemplate')
@section('content')

    <div class="mt-16 flex justify-center px-3">
    <div class="w-full md:w-2/5 bg-white rounded">
        <div class="mb-2 border-b text-black capitalize text-xl py-3 px-4">Invite a friend to Join Bido</div>
        <div class="px-4">
           <form action="{{ url('/invite-friends') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mb-3">
                    <input type="text" name="email1" class="modal-input" placeholder="Enter email address of the person" required>
                </div>
                <div class="mb-3">

                    <input type="text" name="email2" class="modal-input" placeholder="Enter email address of the person">
                </div>
                <div class="mb-3">
                    <input type="text" name="email3" class="modal-input" placeholder="Enter email address of the person">
                </div>
               
                <div class="modal-footer">
                    <button type="submit" class="modal-button">Invite</button>
                </div>
                </form>

            </div>
        </div>
    </div>


    @endsection