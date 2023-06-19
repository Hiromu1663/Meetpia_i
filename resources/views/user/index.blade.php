<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            一覧ページ
        </h2>
    </x-slot> --}}

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="./assets/vendor/preline/dist/preline.js"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                    <div class="container px-5 mx-auto">
                        <div class="flex flex-wrap w-full mb-20">
                        <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                            <div class="sm:text-1xl text-1xl font-medium title-font mb-2 text-gray-900">New Event -></div>
                        </div>
                        {{-- <div class="flex flex-wrap -m-4">
                        <div class="xl:w-1/4 md:w-1/2 p-4">
                            <div class="bg-gray-100 p-6 rounded-lg">
                            <img class="h-40 rounded w-full object-cover object-center" src="{{ asset('storage/images/'.$project->image) }}" alt="content">
                            <h2 class="text-lg text-gray-900 font-medium title-font mb-4 text-center">{{ $project->title }}</h2>
                            <p class="leading-relaxed text-base">Laocation: {{ $project->location }}</p>
                            <p class="leading-relaxed text-base">Date: {{ $project->start_time }}</p>
                            <a href="#">
                                <i class="fa fa-heart mt-3" aria-hidden="true">600</i>
                            </a>
                            <a href="#">
                                <i class="fa fa-commenting ml-2" aria-hidden="true">120</i>
                            </a>
                            <a href="#">
                                <i class="fa fa-user-circle-o ml-2" aria-hidden="true"></i>
                            </a>
                            </div>
                        </div>
                        <div class="xl:w-1/4 md:w-1/2 p-4">
                            <div class="bg-gray-100 p-6 rounded-lg">
                            <img class="h-40 rounded w-full object-cover object-center" src="https://dummyimage.com/720x400" alt="content">
                            <h2 class="text-lg text-gray-900 font-medium title-font mb-4 text-center">Event Title</h2>
                            <p class="leading-relaxed text-base">Laocation: text text text</p>
                            <p class="leading-relaxed text-base">Date: text text text</p>
                            <a href="#">
                                <i class="fa fa-heart mt-3" aria-hidden="true">600</i>
                            </a>
                            <a href="#">
                                <i class="fa fa-commenting ml-2" aria-hidden="true">120</i>
                            </a>
                            <a href="#">
                                <i class="fa fa-user-circle-o ml-2" aria-hidden="true">owner name</i>
                            </a>
                            </div>
                        </div>
                        <div class="xl:w-1/4 md:w-1/2 p-4">
                            <div class="bg-gray-100 p-6 rounded-lg">
                            <img class="h-40 rounded w-full object-cover object-center" src="https://dummyimage.com/720x400" alt="content">
                            <h2 class="text-lg text-gray-900 font-medium title-font mb-4 text-center">Event Title</h2>
                            <p class="leading-relaxed text-base">Laocation: text text text</p>
                            <p class="leading-relaxed text-base">Date: text text text</p>
                            <a href="#">
                                <i class="fa fa-heart mt-3" aria-hidden="true">600</i>
                            </a>
                            <a href="#">
                                <i class="fa fa-commenting ml-2" aria-hidden="true">120</i>
                            </a>
                            <a href="#">
                                <i class="fa fa-user-circle-o ml-2" aria-hidden="true">owner name</i>
                            </a>
                            </div>
                        </div>
                        <div class="xl:w-1/4 md:w-1/2 p-4">
                            <div class="bg-gray-100 p-6 rounded-lg">
                            <img class="h-40 rounded w-full object-cover object-center" src="https://dummyimage.com/720x400" alt="content">
                            <h2 class="text-lg text-gray-900 font-medium title-font mb-4 text-center">Event Title</h2>
                            <p class="leading-relaxed text-base">Laocation: text text text</p>
                            <p class="leading-relaxed text-base">Date: text text text</p>
                            <a href="#">
                                <i class="fa fa-heart mt-3" aria-hidden="true">600</i>
                            </a>
                            <a href="#">
                                <i class="fa fa-commenting ml-2" aria-hidden="true">120</i>
                            </a>
                            <a href="#">
                                <i class="fa fa-user-circle-o ml-2" aria-hidden="true">owner name</i>
                            </a>
                            </div>
                        </div> --}}

                        <div class="flex flex-wrap -m-4">
                            @foreach($projects as $project)
                                <div class="xl:w-1/4 md:w-1/2 p-4">
                                    <div class="bg-gray-100 p-6 rounded-lg">
                                        <img class="h-40 rounded w-full object-cover object-center" src="{{ asset('storage/images/'.$project->image) }}" alt="content">
                                        <h2 class="text-lg text-gray-900 font-medium title-font mb-4 text-center">{{ $project->title }}</h2>
                                        <p class="leading-relaxed text-base">Location: {{ $project->location }}</p>
                                        <p class="leading-relaxed text-base">Date: {{ $project->start_time }}</p>
                                        <a href="#">
                                            <i class="fa fa-heart mt-3" aria-hidden="true">600</i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-commenting ml-2" aria-hidden="true">120</i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-user-circle-o ml-2" aria-hidden="true">{{ $project->user->name }}</i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                    </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
