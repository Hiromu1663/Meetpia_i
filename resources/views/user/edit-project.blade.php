<x-app-layout>
<body>
  <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            {{-- <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a> --}}
            Edit Project
        </x-slot>
  
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
  
        <form method="POST" action="{{ route('user.update-project',$project->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
  
            <!-- Title -->
            <div>
                <x-label for="title" :value="__('Title')" />
                <x-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $project->title }}" required autofocus />
            </div>
  
            <!-- Contents -->
            <div class="mt-4">
                <label for="contents" class="font-medium text-sm text-gray-700 block">Contents</label>
                <textarea id="contents" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block" name="contents" cols="42" rows="5">{{ $project->contents }}</textarea>
            </div>

            {{-- Image --}}
            <div class="mt-4">
                <x-label for="image" :value="__('Image')" />
                <x-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" />
            </div>

            {{-- Category --}}
            <div class="mt-4">
                <x-label for="genre" :value="__('Genre')" />
                <div id="genre" class="flex">
                    <x-label for="business" :value="__('Business')" />
                    <x-input id="business" class="block mt-1 mr-2" type="radio" name="genre" value="Business" :checked="$project->genre === 'Business'" />

                    <x-label for="hobby" :value="__('Hobby')" />
                    <x-input id="hobby" class="block mt-1 mr-2" type="radio" name="genre" value="Hobby" :checked="$project->genre === 'Hobby'" />

                    <x-label for="study" :value="__('Study')" />
                    <x-input id="study" class="block mt-1 mr-2" type="radio" name="genre" value="Study" :checked="$project->genre === 'Study'" />

                    <x-label for="trade" :value="__('Trade')" />
                    <x-input id="trade" class="block mt-1 mr-2" type="radio" name="genre" value="Trade" :checked="$project->genre === 'Trade'" />

                    <x-label for="others" :value="__('Others')" />
                    <x-input id="others" class="block mt-1" type="radio" name="genre" value="Others" :checked="$project->genre === 'Others'" />
                </div>  
            </div>

            {{-- Date & Time --}}
            <div class="mt-4 mr-4">
                <x-label for="date" :value="__('Date')" />
                <div id="date" class="flex">
                    <x-input id="start_time" class="block" type="datetime-local" name="start_time" value="{{ $project->start_time}}" required />
                    <span class="block mt-1 pt-1">~</span>
                    <x-input id="end_time" class="block" type="datetime-local" name="end_time" value="{{ $project->end_time}}" required />
                </div>
            </div>

            {{-- Location --}}
            <div class="mt-4">
                <x-label for="location" :value="__('Location')" />
                <x-input id="location" class="block mt-1 w-full" type="text" name="location" value="{{ $project->location}}" />
            </div>
            

            



  
            <div class="flex items-center justify-end mt-4">
                {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('user.login') }}">
                    {{ __('Already registered?') }}
                </a> --}}
  
                <x-button class="ml-4">
                    {{ __('Edit') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
  </x-guest-layout>
  
</body>
</x-app-layout>


