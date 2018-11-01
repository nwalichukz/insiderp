@inject('Helper', 'App\HelperClass')
@extends('layouts.usertemplate')
@section('content')
    <div class="mt-16 flex justify-center px-3">
        <div class="w-full md:w-1/2 bg-white rounded">
            <div class="mb-2 border-b text-black capitalize text-xl py-3 px-4">About us</div>
            <div class="px-4">
                <div class="mb-4">
                    <h4 class="text-xl font-normal underline">
                        Bido?
                    </h4>
                    <div class="mt-2">
                        <p>What is bido? Bido is a social tool developed to enable users make post on relevant information, news, share ideas,
                            opinions and articles targeted at getting the audience informed and connected with one another through their discussions 
                            and contributions on the platform.</p>
                    </div>
                </div>

                <div class="mb-4">
                    <h4 class="text-xl font-normal underline">
                        Our Mission
                    </h4>
                    <div class="mt-2">
                        <p class="mb-2">
                            To create an enabling environments that reinvents how people connect, share and get involved in social discussions.
                        </p>

                    <!--    <ol>
                            <li>Innovation</li>
                            <li>Excellence</li>
                            <li>Constant Improvement</li>
                            <li>People first business approach </li>
                            <li>Forward thinking and simplicity approach to issues</li>

                        </ol> -->
                    </div>
                </div>

                <div class="mb-4">
                    <h4 class="text-xl font-normal underline">
                        Our vision?
                    </h4>
                    <div class="mt-2">
                        <p>
                            To build an institution that promotes social discussions.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection