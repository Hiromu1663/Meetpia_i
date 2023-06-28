<x-guest-layout>
  <x-auth-card>
      <x-slot name="logo">
          <a href="/">
              <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
          </a>
      </x-slot>

      <!-- Validation Errors -->
      <x-auth-validation-errors class="mb-4" :errors="$errors" />

      <form method="POST" action="{{ route('user.store_review', ['id' => $join->id]) }}">
          @csrf
          Review
          <div class="mt-4">
            <x-label for="score" :value="__('Score')" />
            <div id="review" class="flex">
                <x-label for="1" :value="__('1:Very Poor')" />
                <x-input id="1" class="block mt-1 mr-2" type="radio" name="score" value="1" />

                <x-label for="2" :value="__('2:Poor')" />
                <x-input id="2" class="block mt-1 mr-2" type="radio" name="score" value="2" />

                <x-label for="3" :value="__('3:Fair')" />
                <x-input id="3" class="block mt-1 mr-2" type="radio" name="score" value="3" />

                <x-label for="4" :value="__('4:Good')" />
                <x-input id="4" class="block mt-1 mr-2" type="radio" name="score" value="4" />

                <x-label for="5" :value="__('5:Excellent')" />
                <x-input id="5" class="block mt-1 mr-2" type="radio" name="score" value="5" />
            </div>  
        </div>
          <div class="mt-4">
            <label for="review_comment" class="font-medium text-sm text-gray-700 block">Comment</label>
            <textarea id="review_comment" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block" name="review_comment" cols="42" rows="5"></textarea>
          </div>

          <div class="flex items-center justify-end mt-4">
              <x-button class="ml-4">
                  {{ __('Submit') }}
              </x-button>
          </div>
      </form>
  </x-auth-card>
</x-guest-layout>
