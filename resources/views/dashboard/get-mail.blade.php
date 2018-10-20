@inject('Helper', 'App\HelperClass')
@extends('layouts.usertemplate')
@section('content')
<div class="mt-16 flex justify-center px-3">
    <div class="w-full md:w-2/5 bg-white rounded">
        <div class="mb-2 border-b text-black capitalize text-xl py-3 px-4">Add Mail</div>
        <div class="px-4">
           <form action="{{url('send-bulk-mail')}}" method="post" enctype="multipart/form-data" id="">
                 {{ csrf_field() }}
                    <div class="mb-3">
                        <input type="text" name="subject" class="modal-input" placeholder="Enter the subject of the mail here" required>
                    </div>
                    
                    <div class="mb-3">
                    <textarea name="content" rows="3" id="textPost" class="modal-input" placeholder="Write message here" required></textarea>
                </div>
    
                <div class="modal-footer">
                    <button type="submit" class="modal-button">Send mail</button>
                </div>
                </form>

            </div>
        </div>
    </div>

@endsection