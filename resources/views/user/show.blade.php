<x-app-layout>
<body>
  {{-- プロフィールカード --}}
  <div class="text-gray-600 body-font overflow-hidden">
    <div class="container px-5 py-12 mx-auto">
      <div class="lg:h-full mx-auto flex sm:flex-col sm:items-center md:flex-row">
        <a href="{{ route('user.editAvatar', $user->id) }}" class="ml-10 mb-1">
          <div class="sm:w-96 md:w-60 lg:w-96 md:h-60 lg:h-96">
            <img alt="profile-image" class="w-full h-full object-cover object-center rounded-full" src="{{ asset('storage/images/'.$user->avatar) }}">
          </div>
        </a>
      
        <div class="lg:w-4/6 lg:py-6 pl-8 mt-6 mb-3 lg:mt-0"> 
          <h1 class="text-gray-900 text-3xl title-font font-medium">{{ $user->name }}</h1>
          <a href="{{ route('user.edit', $user->id) }}" class="ml-5 mb-1"><h2>Edit Profile</h2></a>
          <div class="flex">
            <span class="flex items-center">
              {{-- <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
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
              </svg> --}}
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
              </svg>
              @if($user->scored_count !== 0)
              <span class="text-gray-600 ml-1">{{ round($user->scores / $user->scored_count, 1) }} / 5</span>
              @else
              <span class="text-gray-600 ml-1">0</span>
              @endif
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
                <li class="text-gray-500 mr-3">{{ $age }} years old</li>
                <li class="text-gray-500 mr-3">{{ $user->status }}</li>
              </ul>
            </li>
            @if($user->id == auth()->user()->id)
            {{-- 電話番号、メールアドレス、住所 --}}
            <li>phonenumber : {{ $user->phoneNumber }}</li>
            <li>email : {{ $user->email }}</li>
            <li>address : {{ $user->address }}</li>
            @endif
          </ul>
            {{-- ------------------------------------------------------------------------- --}}

            {{-- 自己紹介 --}}
          <div>
            <div class="flex">
              <p>introduction</p>
              <a href="{{ route('user.editIntroduction', $user->id) }}" class="ml-5"><h2>Edit introduction</h2></a>
            </div>
            <p class="leading-relaxed">{{ $user->introduction }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
          {{-- ------------------------------------------------------------------------- --}}


@if($user->id == auth()->user()->id)
  <select id="filter-select" class="ml-24 mt-10 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block">
    <option value="all">Your events</option>
    <option value="create">Created by you</option>
    <option value="join">Joined events</option>
    <option value="favorite">Favorite events</option>
  </select>
          

  {{-- all企画 --}}
  <div id="all" class="text-gray-600 body-font">
    @foreach($projects as $project)
    <div class="container mx-auto flex px-5 py-12 md:flex-row flex-col items-center">
      <div class="lg:max-w-lg lg:w-1/3 md:w-1/2 w-5/6 mb-10 md:mb-0">
        <a href="{{ route('user.show-project', $project->id) }}"><img class="object-cover object-center rounded" alt="project-image" src="{{ asset('storage/images/'.$project->image) }}"></a>
      </div>
      <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
        <div class="flex justify-between w-full pr-10">
          <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $project->title }}</h1>
          {{-- 参加した企画の終了後から1週間のみreview表示 --}}
          @if ($project->JoinedBy(Auth::user())->exists() && strtotime($project->end_time) < time() && strtotime($project->end_time) + (7 * 24 * 60 * 60) >= time() && $project->JoinedBy(Auth::user())->first()->score == null)
          <div>
            <a href="{{ route('user.create_review', ['id' => $project->JoinedBy(Auth::user())->first()->id]) }}" class="mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Review</a>
          </div>
          @endif
        </div>
        <p class="mb-8 leading-relaxed">{{ $project->contents }}</p>
        <div>
          <div class="">
            <p>Location</p>
            <p class="title-font font-medium text-2xl text-gray-900">{{ $project->location }}</p>
          </div>
          <div class="">
            <p>Date</p>
            <p class="title-font font-medium text-2xl text-gray-900">{{ $project->start_time }}〜{{ $project->end_time }}</p>     
          </div>
      
          <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5">
            <a href="{{ route('user.show-project', $project->id) }}"><p class="mr-3">More Infomation</p></a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  {{-- create企画 --}}
  <div id="create" class="text-gray-600 body-font hidden">
    @foreach($create as $project)
    <div class="container mx-auto flex px-5 py-12 md:flex-row flex-col items-center">
      <div class="lg:max-w-lg lg:w-1/3 md:w-1/2 w-5/6 mb-10 md:mb-0">
        <a href="{{ route('user.show-project', $project->id) }}"><img class="object-cover object-center rounded" alt="project-image" src="{{ asset('storage/images/'.$project->image) }}"></a>
      </div>
      <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
        <div class="flex justify-between w-full pr-10">
          <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $project->title }}</h1>
          {{-- 参加した企画の終了後から1週間のみreview表示 --}}
          @if ($project->JoinedBy(Auth::user())->exists() && strtotime($project->end_time) < time() && strtotime($project->end_time) + (7 * 24 * 60 * 60) >= time() && $project->JoinedBy(Auth::user())->first()->score == null)
          <div>
            <a href="" class="mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Review</a>
          </div>
          @endif
        </div>
        <p class="mb-8 leading-relaxed">{{ $project->contents }}</p>
        <div>
          <div class="">
            <p>Location</p>
            <p class="title-font font-medium text-2xl text-gray-900">{{ $project->location }}</p>
          </div>
          <div class="">
            <p>Date</p>
            <p class="title-font font-medium text-2xl text-gray-900">{{ $project->start_time }}〜{{ $project->end_time }}</p>     
          </div>
      
          <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5">
            <a href="{{ route('user.show-project', $project->id) }}"><p class="mr-3">More Infomation</p></a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  {{-- join企画 --}}
  <div id="join" class="text-gray-600 body-font hidden">
    @foreach($join as $project)
    <div class="container mx-auto flex px-5 py-12 md:flex-row flex-col items-center">
      <div class="lg:max-w-lg lg:w-1/3 md:w-1/2 w-5/6 mb-10 md:mb-0">
        <a href="{{ route('user.show-project', $project->id) }}"><img class="object-cover object-center rounded" alt="project-image" src="{{ asset('storage/images/'.$project->image) }}"></a>
      </div>
      <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
        <div class="flex justify-between w-full pr-10">
          <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $project->title }}</h1>
          {{-- 参加した企画の終了後から1週間のみreview表示 --}}
          @if ($project->JoinedBy(Auth::user())->exists() && strtotime($project->end_time) < time() && strtotime($project->end_time) + (7 * 24 * 60 * 60) >= time() && $project->JoinedBy(Auth::user())->first()->score == null)
          <div>
            <a href="" class="mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Review</a>
          </div>
          @endif
        </div>
        <p class="mb-8 leading-relaxed">{{ $project->contents }}</p>
        <div>
          <div class="">
            <p>Location</p>
            <p class="title-font font-medium text-2xl text-gray-900">{{ $project->location }}</p>
          </div>
          <div class="">
            <p>Date</p>
            <p class="title-font font-medium text-2xl text-gray-900">{{ $project->start_time }}〜{{ $project->end_time }}</p>     
          </div>
      
          <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5">
            <a href="{{ route('user.show-project', $project->id) }}"><p class="mr-3">More Infomation</p></a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  {{-- favorite企画 --}}
  <div id="favorite" class="text-gray-600 body-font hidden">
    @foreach($favorite as $project)
    <div class="container mx-auto flex px-5 py-12 md:flex-row flex-col items-center">
      <div class="lg:max-w-lg lg:w-1/3 md:w-1/2 w-5/6 mb-10 md:mb-0">
        <a href="{{ route('user.show-project', $project->id) }}"><img class="object-cover object-center rounded" alt="project-image" src="{{ asset('storage/images/'.$project->image) }}"></a>
      </div>
      <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
        <div class="flex justify-between w-full pr-10">
          <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $project->title }}</h1>
          {{-- 参加した企画の終了後から1週間のみreview表示 --}}
          @if ($project->JoinedBy(Auth::user())->exists() && strtotime($project->end_time) < time() && strtotime($project->end_time) + (7 * 24 * 60 * 60) >= time() && $project->JoinedBy(Auth::user())->first()->score == null)
          <div>
            <a href="" class="mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Review</a>
          </div>
          @endif
        </div>
        <p class="mb-8 leading-relaxed">{{ $project->contents }}</p>
        <div>
          <div class="">
            <p>Location</p>
            <p class="title-font font-medium text-2xl text-gray-900">{{ $project->location }}</p>
          </div>
          <div class="">
            <p>Date</p>
            <p class="title-font font-medium text-2xl text-gray-900">{{ $project->start_time }}〜{{ $project->end_time }}</p>     
          </div>
      
          <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5">
            <a href="{{ route('user.show-project', $project->id) }}"><p class="mr-3">More Infomation</p></a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
@else
  {{-- create企画 --}}
  <div id="create" class="text-gray-600 body-font">
    @foreach($create as $project)
    <div class="container mx-auto flex px-5 py-12 md:flex-row flex-col items-center">
      <div class="lg:max-w-lg lg:w-1/3 md:w-1/2 w-5/6 mb-10 md:mb-0">
        <a href="{{ route('user.show-project', $project->id) }}"><img class="object-cover object-center rounded" alt="project-image" src="{{ asset('storage/images/'.$project->image) }}"></a>
      </div>
      <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
        <div class="flex justify-between w-full pr-10">
          <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $project->title }}</h1>
        </div>
        <p class="mb-8 leading-relaxed">{{ $project->contents }}</p>
        <div>
          <div class="">
            <p>Location</p>
            <p class="title-font font-medium text-2xl text-gray-900">{{ $project->location }}</p>
          </div>
          <div class="">
            <p>Date</p>
            <p class="title-font font-medium text-2xl text-gray-900">{{ $project->start_time }}〜{{ $project->end_time }}</p>     
          </div>
      
          <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5">
            <a href="{{ route('user.show-project', $project->id) }}"><p class="mr-3">More Infomation</p></a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
@endif


</body>

</x-app-layout>