@inject('Helper', 'App\HelperClass')
@extends('layouts.usertemplate')
@section('content')
    <div class="mt-16 flex justify-center px-3">
        <div class="w-full md:w-2/5 bg-white rounded">
            <div class="mb-2 border-b text-black capitalize text-xl py-3 px-4">Contact us</div>
            <div class="px-4">
                <form class="my-3" id='post-ajax-contactus' action="{{ url('send-enquiry') }}" role="form" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="mb-3">
                        <input type="text" class="modal-input" placeholder="Your name" name='name' required>
                    </div>

                    <div class="mb-3">

                        <input type="email" class="modal-input" placeholder="Your email address" name='email' required>
                    </div>


                    <div class="mb-3">

                        <input type="text" class="modal-input" placeholder="The Subject of your message" name='subject' required>
                    </div>
                    <div class="mb-3">

                        <textarea class="modal-input" id="message" placeholder="Write your message here..." style="height:100px;" name="message" required></textarea>
                    </div>
                    <div class="flex items-center">
                        <button name='send' type="submit" class="modal-button mr-3">
                            <span>Send message</span>
                        </button>
                        <button type="reset" class="modal-button mr-3">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection