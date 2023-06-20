<x-app-layout>
<body>
  {{-- プロフィールカード --}}
  <div class="text-gray-600 body-font overflow-hidden">
    <div class="container px-5 py-12 mx-auto">
      <div class="lg:h-full mx-auto flex sm:flex-col sm:items-center md:flex-row">
        <div class="sm:w-96 md:w-60 lg:w-96 md:h-60 lg:h-96">
          <img alt="profile-image" class="w-full h-full object-cover object-center rounded-full" src="{{ asset('storage/images/'.$user->avatar) }}">
        </div>
      
        <div class="lg:w-4/6 lg:py-6 pl-5 mt-6 mb-3 lg:mt-0"> 
          <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $user->name }}</h1>
          <div class="flex">
            <span class="flex items-center">
              <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
              </svg>
              <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
              </svg>
              <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
              </svg>
              <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
              </svg>
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
              </svg>
              <span class="text-gray-600 ml-3">4</span>
            </span>
            <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200 space-x-2s">
              <a class="text-gray-500">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                </svg>
              </a>
              <a class="text-gray-500">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                </svg>
              </a>
              <a class="text-gray-500">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                </svg>
              </a>
            </span>
          </div>

            {{-- 年齢、性別、職業を横並びで表示 --}}
          <ul class="space-x-2s mb-4">
            <li>
              <ul class="flex space-x-2s">
                <li class="text-gray-500 mr-3">{{ $user->gender }}</li>
                <li class="text-gray-500 mr-3">{{ $user->age }}</li>
                <li class="text-gray-500 mr-3">{{ $user->status }}</li>
              </ul>
            </li>
            {{-- 電話番号、メールアドレス、住所 --}}
            <li>phonenumber : {{ $user->phonenumber }}</li>
            <li>email : {{ $user->email }}</li>
            <li>address : {{ $user->address }}</li>
          </ul>
            {{-- ------------------------------------------------------------------------- --}}

            {{-- 自己紹介 --}}
          <div>
            <p>introduction</p>
            <p class="leading-relaxed">{{ $user->introduction }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
          {{-- ------------------------------------------------------------------------- --}}



  {{-- 自分の企画一覧 --}}
  <div class="text-gray-600 body-font">
    @foreach($projects as $project)
    <div class="container mx-auto flex px-5 py-12 md:flex-row flex-col items-center">
      <div class="lg:max-w-lg lg:w-1/3 md:w-1/2 w-5/6 mb-10 md:mb-0">
        <img class="object-cover object-center rounded" alt="project-image" src="{{ asset('storage/images/'.$project->image) }}">
      </div>
      <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $project->title }}</h1>
        <p class="mb-8 leading-relaxed">{{ $project->contents }}</p>
      </div>
    </div>
    @endforeach
  </div>
</body>

</x-app-layout>