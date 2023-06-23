<x-guest-layout>
  <x-auth-card>
      <x-slot name="logo">
          <a href="/">
              <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
          </a>
      </x-slot>

      <!-- Validation Errors -->
      <x-auth-validation-errors class="mb-4" :errors="$errors" />

      <form method="POST" action="{{ route('user.updateAvatar', $user->id) }}" enctype="multipart/form-data">
          @csrf
          @method('put')
          Edit Avatar
          <!--avatar-->
          <div class="mt-4">
            <x-label for="avatar" :value="__('Avatar')" />
            <img src={{ asset('storage/images/'.$user->avatar) }} alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4">
            <x-input id="avatar" class="block mt-1 w-full" type="file" name="avatar" value="{{ $user->avatar }}" />
          </div>

          <div class="flex items-center justify-end mt-4">
              <x-button class="ml-4">
                  {{ __('Update') }}
              </x-button>
          </div>
      </form>
  </x-auth-card>
</x-guest-layout>
