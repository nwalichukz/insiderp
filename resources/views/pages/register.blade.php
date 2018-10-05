@extends('layouts.indextemplate')
@section('content')
    <div class="container mx-auto mt-16 h-full flex items-center justify-center">
        <div class="w-full md:w-1/2 lg:w-1/3">
            <div class="font-hairline text-2xl text-center mb-6">Sign up</div>

            <div class="bg-white border-t-8 border-blue rounded flex justify-center py-8 mx-2 lg:mx-0 mb-6">
                <form action="{{url('register-user')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mb-4">
                        
                        <input type="text" name="name" placeholder="Full Name" class="appearance-none font-normal border border-solid w-68 py-3 px-3 rounded focus:border-blue" required>
                    </div>

                    <div class="mb-4">
                        
                        <input type="email" name="email" placeholder="Email Address" class="appearance-none font-normal border border-solid w-68 py-3 px-3 rounded focus:border-blue" required>
                    </div>

                    <div class="mb-4">
                        
                        <input type="text" name="user_name" placeholder="Enter a user name must be unique" onkeyup="checkUnique();" class="appearance-none font-normal border border-solid w-68 py-3 px-3 rounded focus:border-blue" required>
                    </div>

                    <div class="mb-4">
                        
                        <input type="password" name="password" placeholder="Password" class="appearance-none font-normal border border-solid w-68 py-3 px-3 rounded focus:border-blue" required>
                    </div>

                    <div class="mb-4">
                        
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="appearance-none font-normal border border-solid w-68 py-3 px-3 rounded focus:border-blue" required>
                    </div>

                    <div class="flex items-center justify-between">
                        <div><input type="submit" value="Sign up" class="appearance-none border py-3 px-6 rounded shadow bg-white text-black hover:bg-blue hover:text-white hover:rounded-lg tracking-wide"></div>
                    </div>
                </form>
            </div>
            <div class="text-center text-blue font-bold text-sm tracking-wide">Have an account? &middot; <a href="{{ url('login') }}" class="hover:text-black">Login.</a></div>
        </div>

    </div>
@endsection