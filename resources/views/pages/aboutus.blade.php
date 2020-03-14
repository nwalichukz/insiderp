@inject('Helper', 'App\HelperClass')
@extends('layouts.usertemplate')
@section('content')
    <div class="mt-16 flex justify-center px-3">
        <div class="w-full md:w-1/2 bg-white rounded">
            <div class="mb-2 border-b text-black capitalize text-xl py-3 px-4">About us</div>
            <div class="px-4">
                <div class="mb-4">
                    <h4 class="text-xl font-normal underline">
                        The Southeast Post?
                    </h4>
                    <div class="mt-2">
                        <p>The Southeast Post is an independent online news website, featuring opinions,  Political analysis, sports, world news...
Discussing the issues that affect us and our society especially in Nigeria... We promote social discusssions about important issues in our society.</p>
                    </div>
                </div>

                <div class="mb-4">
                    <h4 class="text-xl font-normal underline">
                        Our Mission
                    </h4>
                    <div class="mt-2">
                        <p class="mb-2">
                           Sharing the truth through unbiased news reporting.
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
                            To build an institution that promotes social discussions and tells our own story.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection