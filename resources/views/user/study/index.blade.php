<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         Study
      </h2>
  </x-slot>

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="./assets/vendor/preline/dist/preline.js"></script>
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <section class="text-gray-600 body-font">
                      <div class="flex justify-center items-center">
                          {{-- <div class="relative flex rounded-md">
                            <form method="get" action="{{ route('user.index') }}">
                            <input type="text" name="search" class="flex items-center justify-center w-full py-3 px-4 border-gray-200 shadow-sm rounded-l-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-5 dark:text-gray-400">
                            <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none z-20 pl-4">
                              <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                              </svg>
                            </div>
                            <button type="button" class="py-3 px-4 inline-flex flex-shrink-0 justify-center items-center rounded-r-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:z-10 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all text-sm">Search</button>
                            </form>
                          </div> --}}
                          <div>
                            <label for="hs-trailing-button-add-on-with-icon-and-button" class="sr-only">Label</label>
                            <form method="get" action="{{ route('user.study.index') }}">
                            <div class="relative flex rounded-md shadow-sm">
                              <input type="text" name="search" class="py-3 px-4 pl-11 block w-full border-gray-200 shadow-sm rounded-l-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-5 dark:text-gray-400">
                              <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none z-20 pl-4">
                                <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                              </div>
                              <button class="py-3 px-4 inline-flex flex-shrink-0 justify-center items-center rounded-r-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:z-10 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all text-sm">Search</button>
                            </div>
                            </form> 
                          </div>
                      </div>

                      {{-- <div class="container px-5 py-5 mx-auto flex items-center justify-center">
                        <ul class="flex space-x-3 text-sm">
                          <li class="flex space-x-3">
                            <input type="checkbox" class="h-6 w-6 text-blue-500 rounded-2xl" id="checkbox1">
                            <span class="text-gray-800 dark:text-gray-400">
                              Select
                            </span>
                          </li>
                          <li class="flex space-x-3">
                            <input type="checkbox" class="h-6 w-6 rounded-2xl text-blue-500" id="checkbox2">
                            <span class="text-gray-800 dark:text-gray-400">
                              Select
                            </span>
                          </li>
                          <li class="flex space-x-3">
                            <input type="checkbox" class="h-6 w-6 rounded-2xl text-blue-500" id="checkbox3">
                            <span class="text-gray-800 dark:text-gray-400">
                              Select
                            </span>
                          </li>
                          <li class="flex space-x-3">
                            <input type="checkbox" class="h-6 w-6 rounded-2xl text-blue-500" id="checkbox4">
                            <span class="text-gray-800 dark:text-gray-400">
                              Select
                            </span>
                          </li>
                          <li class="flex space-x-3">
                            <input type="checkbox" class="h-6 w-6 rounded-2xl text-blue-500" id="checkbox5">
                            <span class="text-gray-800 dark:text-gray-400">
                              Select
                            </span>
                          </li>
                        </ul>
                      </div> --}}

                      {{-- <div class="container px-5 py-5 mx-auto flex items-center justify-center">
                          <ul class="flex space-x-3 text-sm">
                            <li class="flex space-x-3">
                              <input type="checkbox" class="h-6 w-6 rounded-2xl text-blue-500" id="checkbox1">
                              <span class="text-gray-800 dark:text-gray-400">
                                Select
                              </span>
                            </li>
                            <li class="flex space-x-3">
                              <input type="checkbox" class="h-6 w-6 rounded-2xl text-blue-500" id="checkbox2">
                              <span class="text-gray-800 dark:text-gray-400">
                                Select
                              </span>
                            </li>
                            <li class="flex space-x-3">
                              <input type="checkbox" class="h-6 w-6 rounded-2xl text-blue-500" id="checkbox3">
                              <span class="text-gray-800 dark:text-gray-400">
                                Select
                              </span>
                            </li>
                            <li class="flex space-x-3">
                              <input type="checkbox" class="h-6 w-6 rounded-2xl text-blue-500" id="checkbox4">
                              <span class="text-gray-800 dark:text-gray-400">
                                Select
                              </span>
                            </li>
                            <li class="flex space-x-3">
                              <input type="checkbox" class="h-6 w-6 rounded-2xl text-blue-500" id="checkbox5">
                              <span class="text-gray-800 dark:text-gray-400">
                                Select
                              </span>
                            </li>
                          </ul>
                      </div> --}}
                        
                      <div class="container px-5 py-10 mx-auto flex flex-wrap">
                          <div class="flex flex-wrap -m-4">
                            @forelse($study as $project)
                            <div class="xl:w-1/4 md:w-1/2 p-4">
                              <div class="bg-gray-100 p-6 rounded-lg">
                                <a href="{{ route('user.show_project', ['id' => $project->id]) }}">
                                  <img class="h-40 rounded w-full object-cover object-center mb-6" src="{{ asset('storage/images/' .$project->image) }}" alt="content">
                                </a>
                                <h2 class="text-lg text-gray-900 font-medium title-font mb-4 mt-2 text-center">{{ $project->title }}</h2>
                                <p class="leading-relaxed text-base">Location : {{ $project->location }}</p>
                                <p class="leading-relaxed text-base">Start : {{ $project->start_time }}</p>
                                <p class="leading-relaxed text-base">End : {{ $project->end_time }}</p>
                                <i class="fa fa-heart mt-3" aria-hidden="true">{{ $project->favorites->count() }}</i>
                                <i class="fa fa-commenting ml-2" aria-hidden="true">{{ $project->joins->count() }}/{{ $project->max_number }}</i>
                                <i class="fa fa-user-circle-o ml-2" aria-hidden="true">{{ $project->user->name }}</i>
                              </div>
                            </div>
                            @empty
                                <!-- No matching projects found -->
                                <p>No matching projects found.</p>
                            @endforelse
                          </div>
                        </div>                          
                  </section>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
