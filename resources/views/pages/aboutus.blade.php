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
                        <p>A social tool that allow users post news, opinions, articles, questions and get involved in discussing
                            those issues that affect us and our society especially in Nigeria A user generated content
                            platform that is moderated. This platform is targeted at encoraging national discussion and conversation especially
                            among the youths.</p>
                    </div>
                </div>

                <div class="mb-4">
                    <h4 class="text-xl font-normal underline">
                        Our Mission
                    </h4>
                    <div class="mt-2">
                        <p class="mb-2">
                            To create an environment that will encourage discussion of issues in our society. Our main focus is
                            to spark important discussions in the society among the youths. To encourage Nigerian youths to engage in
                            social discussions about issues in Nigeria. To achieve
                            this we would be engaging our business through the following:
                        </p>

                        <ol>
                            <li>Innovation</li>
                            <li>Excellence</li>
                            <li>Constant Improvement</li>
                            <li>People first business approach </li>
                            <li>Forward thinking and simplicity approach to issues</li>

                        </ol>
                    </div>
                </div>

                <div class="mb-4">
                    <h4 class="text-xl font-normal underline">
                        Our vision?
                    </h4>
                    <div class="mt-2">
                        <p>
                            To build an institution that promotes discussion about issues in our society
                            and encourage people to take responsibility towards addressing them.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection