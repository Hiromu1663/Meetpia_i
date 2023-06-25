<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            一覧ページ
        </h2>
    </x-slot> --}}

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/swiper.css') }}" rel="stylesheet">
    <script src="./assets/vendor/preline/dist/preline.js"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                    <div class="container px-5 mx-auto">
                        {{-- <div class="flex flex-wrap w-full mb-20"> --}}
                        <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                            <div class="sm:text-1xl text-1xl font-medium title-font mb-5 text-gray-900">New Event -></div>
                        </div>
                        {{-- <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                            @if ($results->isEmpty())
                                <div class="sm:text-1xl text-1xl font-medium title-font mb-5 text-gray-900">
                                    New Event ->
                                </div>
                            @else
                                <div class="sm:text-1xl text-1xl font-medium title-font mb-5 text-gray-900">
                                    Search Result ->
                                </div>
                            @endif
                        </div> --}}
                        
                        {{-- </div> --}}
                        <!-- Slider main container -->
                        <div class="swiper-container">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper flex flex-wrap">
                                <!-- Slides -->
                                @forelse($projects as $project)
                                    <div class="swiper-slide xl:w-1/4 md:w-1/4 p-4">
                                        <div class="flex flex-wrap -m-4 justify-center">
                                            <div class="bg-gray-100 p-6 rounded-lg">
                                                <div class="w-full">
                                                    <a href="{{ route('user.show', ['id' => $project->id]) }}">
                                                        <div class="h-full flex flex-col items-center text-center">
                                                            <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="{{ asset('storage/images/'.$project->image) }}" style="height: 150px; width: 200px;">
                                                            <div class="h-full">
                                                                <h2 class="title-font font-medium text-lg text-gray-900">{{ $project->title }}</h2>
                                                                <p class="text-base">Location: {{ $project->location }}</p>
                                                                <p class="text-base">Date: {{ $project->start_time }}</p>
                                                                <p class="text-base">Genre: {{ $project->genre }}</p>
                                                                <i class="fa fa-heart mt-3 text-gray-900" aria-hidden="true">600</i>
                                                                <div class="text-gray-900">
                                                                    <i class="fa fa-commenting ml-3" aria-hidden="true">120</i>
                                                                </div>
                                                                <i class="fa fa-user-circle-o ml-2" aria-hidden="true">{{ $project->user->name }}</i>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <!-- No matching projects found -->
                                    <p>No matching projects found.</p>
                                @endforelse
                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>
                        
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        
                            <!-- If we need scrollbar -->
                            <div class="swiper-scrollbar"></div>
                        </div>

                        <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                            <div class="mt-10 sm:text-1xl text-1xl font-medium title-font mb-2 text-gray-900">Business -></div>
                        </div>
                        <div class="swiper-container">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper flex flex-wrap">
                                <!-- Slides -->
                                @forelse($business as $project)
                                    <div class="swiper-slide xl:w-1/4 md:w-1/4 p-4">
                                        <div class="flex flex-wrap -m-4 justify-center">
                                            <div class="bg-gray-100 p-6 rounded-lg">
                                                <div class="w-full">
                                                    <a href="{{ route('user.show', ['id' => $project->id]) }}">
                                                        <div class="h-full flex flex-col items-center text-center">
                                                            <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="{{ asset('storage/images/'.$project->image) }}" style="height: 150px; width: 200px;">
                                                            <div class="h-full">
                                                                <h2 class="title-font font-medium text-lg text-gray-900">{{ $project->title }}</h2>
                                                                <p class="text-base">Location: {{ $project->location }}</p>
                                                                <p class="text-base">Date: {{ $project->start_time }}</p>
                                                                <p class="text-base">Genre: {{ $project->genre }}</p>
                                                                <i class="fa fa-heart mt-3 text-gray-900" aria-hidden="true">600</i>
                                                                <div class="text-gray-900">
                                                                    <i class="fa fa-commenting ml-3" aria-hidden="true">120</i>
                                                                </div>
                                                                <i class="fa fa-user-circle-o ml-2" aria-hidden="true">{{ $project->user->name }}</i>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <!-- No matching projects found -->
                                    <p>No matching projects found.</p>
                                @endforelse
                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>
                        
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        
                            <!-- If we need scrollbar -->
                            <div class="swiper-scrollbar"></div>
                        </div>
                        <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                            <div class="mt-10 sm:text-1xl text-1xl font-medium title-font mb-2 text-gray-900">Hobby -></div>
                        </div>
                        <div class="swiper-container">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper flex flex-wrap">
                                <!-- Slides -->
                                @forelse($hobbies as $project)
                                    <div class="swiper-slide xl:w-1/4 md:w-1/4 p-4">
                                        <div class="flex flex-wrap -m-4 justify-center">
                                            <div class="bg-gray-100 p-6 rounded-lg">
                                                <div class="w-full">
                                                    <a href="{{ route('user.show', ['id' => $project->id]) }}">
                                                        <div class="h-full flex flex-col items-center text-center">
                                                            <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="{{ asset('storage/images/'.$project->image) }}" style="height: 150px; width: 200px;">
                                                            <div class="h-full">
                                                                <h2 class="title-font font-medium text-lg text-gray-900">{{ $project->title }}</h2>
                                                                <p class="text-base">Location: {{ $project->location }}</p>
                                                                <p class="text-base">Date: {{ $project->start_time }}</p>
                                                                <p class="text-base">Genre: {{ $project->genre }}</p>
                                                                <i class="fa fa-heart mt-3 text-gray-900" aria-hidden="true">600</i>
                                                                <div class="text-gray-900">
                                                                    <i class="fa fa-commenting ml-3" aria-hidden="true">120</i>
                                                                </div>
                                                                <i class="fa fa-user-circle-o ml-2" aria-hidden="true">{{ $project->user->name }}</i>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <!-- No matching projects found -->
                                    <p>No matching projects found.</p>
                                @endforelse
                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>
                        
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        
                            <!-- If we need scrollbar -->
                            <div class="swiper-scrollbar"></div>
                        </div>

                        <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                            <div class="mt-10 sm:text-1xl text-1xl font-medium title-font mb-2 text-gray-900">Study -></div>
                        </div>
                        <div class="swiper-container">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper flex flex-wrap">
                                <!-- Slides -->
                                @forelse($study as $project)
                                    <div class="swiper-slide xl:w-1/4 md:w-1/4 p-4">
                                        <div class="flex flex-wrap -m-4 justify-center">
                                            <div class="bg-gray-100 p-6 rounded-lg">
                                                <div class="w-full">
                                                    <a href="{{ route('user.show', ['id' => $project->id]) }}">
                                                        <div class="h-full flex flex-col items-center text-center">
                                                            <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="{{ asset('storage/images/'.$project->image) }}" style="height: 150px; width: 200px;">
                                                            <div class="h-full">
                                                                <h2 class="title-font font-medium text-lg text-gray-900">{{ $project->title }}</h2>
                                                                <p class="text-base">Location: {{ $project->location }}</p>
                                                                <p class="text-base">Date: {{ $project->start_time }}</p>
                                                                <p class="text-base">Genre: {{ $project->genre }}</p>
                                                                <i class="fa fa-heart mt-3 text-gray-900" aria-hidden="true">600</i>
                                                                <div class="text-gray-900">
                                                                    <i class="fa fa-commenting ml-3" aria-hidden="true">120</i>
                                                                </div>
                                                                <i class="fa fa-user-circle-o ml-2" aria-hidden="true">{{ $project->user->name }}</i>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <!-- No matching projects found -->
                                    <p>No matching projects found.</p>
                                @endforelse
                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>
                        
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        
                            <!-- If we need scrollbar -->
                            <div class="swiper-scrollbar"></div>
                        </div>

                        <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                            <div class="mt-10 sm:text-1xl text-1xl font-medium title-font mb-2 text-gray-900">Trade -></div>
                        </div>
                        <div class="swiper-container">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper flex flex-wrap">
                                <!-- Slides -->
                                @forelse($trades as $project)
                                    <div class="swiper-slide xl:w-1/4 md:w-1/4 p-4">
                                        <div class="flex flex-wrap -m-4 justify-center">
                                            <div class="bg-gray-100 p-6 rounded-lg">
                                                <div class="w-full">
                                                    <a href="{{ route('user.show', ['id' => $project->id]) }}">
                                                        <div class="h-full flex flex-col items-center text-center">
                                                            <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="{{ asset('storage/images/'.$project->image) }}" style="height: 150px; width: 200px;">
                                                            <div class="h-full">
                                                                <h2 class="title-font font-medium text-lg text-gray-900">{{ $project->title }}</h2>
                                                                <p class="text-base">Location: {{ $project->location }}</p>
                                                                <p class="text-base">Date: {{ $project->start_time }}</p>
                                                                <p class="text-base">Genre: {{ $project->genre }}</p>
                                                                <i class="fa fa-heart mt-3 text-gray-900" aria-hidden="true">600</i>
                                                                <div class="text-gray-900">
                                                                    <i class="fa fa-commenting ml-3" aria-hidden="true">120</i>
                                                                </div>
                                                                <i class="fa fa-user-circle-o ml-2" aria-hidden="true">{{ $project->user->name }}</i>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <!-- No matching projects found -->
                                    <p>No matching projects found.</p>
                                @endforelse
                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>
                        
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        
                            <!-- If we need scrollbar -->
                            <div class="swiper-scrollbar"></div>
                        </div>
                        
                        <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                            <div class="mt-10 sm:text-1xl text-1xl font-medium title-font mb-2 text-gray-900">Others -></div>
                        </div>
                        <div class="swiper-container">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper flex flex-wrap">
                                <!-- Slides -->
                                @forelse($others as $project)
                                    <div class="swiper-slide xl:w-1/4 md:w-1/4 p-4">
                                        <div class="flex flex-wrap -m-4 justify-center">
                                            <div class="bg-gray-100 p-6 rounded-lg">
                                                <div class="w-full">
                                                    <a href="{{ route('user.show', ['id' => $project->id]) }}">
                                                        <div class="h-full flex flex-col items-center text-center">
                                                            <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="{{ asset('storage/images/'.$project->image) }}" style="height: 150px; width: 200px;">
                                                            <div class="h-full">
                                                                <h2 class="title-font font-medium text-lg text-gray-900">{{ $project->title }}</h2>
                                                                <p class="text-base">Location: {{ $project->location }}</p>
                                                                <p class="text-base">Date: {{ $project->start_time }}</p>
                                                                <p class="text-base">Genre: {{ $project->genre }}</p>
                                                                <i class="fa fa-heart mt-3 text-gray-900" aria-hidden="true">600</i>
                                                                <div class="text-gray-900">
                                                                    <i class="fa fa-commenting ml-3" aria-hidden="true">120</i>
                                                                </div>
                                                                <i class="fa fa-user-circle-o ml-2" aria-hidden="true">{{ $project->user->name }}</i>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <!-- No matching projects found -->
                                    <p>No matching projects found.</p>
                                @endforelse
                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>
                        
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        
                            <!-- If we need scrollbar -->
                            <div class="swiper-scrollbar"></div>
                        </div>
                    </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ mix('js/swiper.js')}}"></script>
</x-app-layout>
