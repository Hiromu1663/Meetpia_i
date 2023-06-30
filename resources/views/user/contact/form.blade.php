<x-app-layout>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <div class="flex items-center justify-center">
  <div class="p-4 lg:w-1/2 md:w-full">
    <form method="POST" action="{{ route('user.contact_confirm') }}">
      @csrf

      <div class="rounded-lg border-gray-200 border-opacity-50  sm:flex-row flex-col">
      <section class="text-gray-600 body-font relative w-full">
        <div class="container p-8 mx-auto">
          <div class="flex flex-col text-center w-full ">
            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Contact US</h2>
          </div>
          <div class="lg:w-full md:w- mx-auto">
            <div class="flex flex-wrap -m-2">
              <div class="p-2 w-1/2">
                <div class="relative">
                  <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                  <input value="{{ old('name') }}" type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  @if ($errors->has('name'))
                  <p class="error-message">{{ $errors->first('name') }}</p>
                  @endif
            </div>
              </div>
              <div class="p-2 w-1/2">
                <div class="relative">
                  <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                  <input value="{{ old('email') }}" type="email" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  @if ($errors->has('email'))
                  <p class="error-message">{{ $errors->first('email') }}</p>
                  @endif
            </div>
              </div>
              <div class="p-2 w-full">
                <div class="relative">
                  <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                  <textarea id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ old('message') }}</textarea>
                </div>
              </div>
              <div class="flex flex-row items-center justify-center p-2 w-full">
                {{-- <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Jion</button> --}}
                <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Contact</button>
                @if ($errors->has('message'))
                <p class="error-message">{{ $errors->first('message') }}</p>
                @endif
              </div>
            </div>
        </div>        
      </section>
    </form>
  </div>
  </div>
</x-app-layout>
