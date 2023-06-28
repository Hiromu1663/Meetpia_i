<x-guest-layout>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <x-auth-card>
      <x-slot name="logo">
          <a href="/">
              <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
          </a>
      </x-slot>

      <!-- Validation Errors -->
      <x-auth-validation-errors class="mb-4" :errors="$errors" />

      <form method="POST" action="{{ route('user.updateIntroduction', $user->id) }}">
          @csrf
          @method('put')
          Edit Introduction
          <div class="mt-4">
            <label for="introduction" class="font-medium text-sm text-gray-700 block">Introduction</label>
            <textarea id="introduction" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block" name="introduction" cols="42" rows="5">{{ $user->introduction }}</textarea>
          </div>

          <div class="flex items-center justify-end mt-4">
              <x-button class="ml-4">
                  {{ __('Update') }}
              </x-button>
          </div>
      </form>
  </x-auth-card>
</x-guest-layout>
