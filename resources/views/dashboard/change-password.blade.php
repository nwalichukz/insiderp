@inject('Helper', 'App\HelperClass')
@extends('layouts.usertemplate')
@section('content')

      <div class="mt-16 flex justify-center px-3">
    <div class="w-full md:w-2/5 bg-white rounded">
        <div class="mb-2 border-b text-black capitalize text-xl py-3 px-4">Change Password</div>
        <div class="px-4">
            <form action="{{url('/change-password')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mb-3">
                    <input type="text" name="oldpassword" class="modal-input" placeholder="Enter old password" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="newpassword" class="modal-input" placeholder="Enter new password" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="newpassword_confirmation" class="modal-input" placeholder="Re-type new password" required>
                </div>

                    <div class="modal-footer">
                        <button type="submit" class="modal-button">Change password</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    @endsection