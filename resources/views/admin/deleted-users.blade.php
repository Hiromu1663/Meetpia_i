<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            削除済みユーザー一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Table Section -->
                    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                        <!-- Card -->
                        <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidde">
                                <!-- Header -->
                                {{-- <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                                <div>
                                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                                    Users
                                    </h2>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                    Add users, edit and more.
                                    </p>
                                </div>
                    
                                
                                </div> --}}
                                <!-- End Header -->
                    
                                <!-- Table -->
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50">
                                    <th scope="col" class="px-6 py-3 text-left h-px w-px whitespace-nowrap">
                                        <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase tracking-wide">
                                            Id
                                        </span>
                                        </div>
                                    </th>
                    
                                    <th scope="col" class="pl-6 lg:pl-3 xl:pl-0 pr-6 py-3 text-left">
                                        <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase tracking-wide">
                                            Name
                                        </span>
                                        </div>
                                    </th>
                    
                                    <th scope="col" class="px-6 py-3 text-left">
                                        <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase tracking-wid">
                                            Position
                                        </span>
                                        </div>
                                    </th>
                    
                                    <th scope="col" class="px-6 py-3 text-left">
                                        <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase tracking-wide">
                                            Deleted Date
                                        </span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left">
                                        <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase tracking-wide"> 
                                        </span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left">
                                        <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase tracking-wide">
                                        </span>
                                        </div>
                                    </th>
                                </thead>
                                @foreach($deletedUsers as $user)
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <tr>
                                    <th scope="col" class="px-6 py-3 text-left">
                                        <div class="py-3 flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase tracking-wide">
                                            {{ $user->id }}
                                        </span>
                                        </div>
                                    </th>
                                    <td class="h-px w-px whitespace-nowrap">
                                        <div class="pl-6 lg:pl-3 xl:pl-0 pr-6 py-3">
                                        <div class="flex items-center gap-x-3">
                                            <img class="inline-block h-[2.375rem] w-[2.375rem] rounded-full" src="https://images.unsplash.com/photo-1531927557220-a9e23c1e4794?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" alt="Image Description">
                                            <div class="grow">
                                            <span class="block text-sm font-semibold">{{ $user->name }}</span>
                                            <span class="block text-sm text-gray-500">{{ $user->email }}</span>
                                            </div>
                                        </div>
                                        </div>
                                    </td>
                                    <td class="h-px w-72 whitespace-nowrap">
                                        <div class="px-6 py-3">
                                        <span class="block text-sm font-semibold">Director</span>
                                        <span class="block text-sm text-gray-500">Human resources</span>
                                        </div>
                                    </td>
                                    <td class="h-px w-px whitespace-nowrap">
                                        <div class="px-6 py-3">
                                        <span class="text-sm text-gray-500">{{ $user->deleted_at }}</span>
                                        </div>
                                    </td>
                                    <td class="h-px w-px whitespace-nowrap">
                                        <a href="{{ route('admin.deleted-users.restore', ['user'=>$user->id]) }}">
                                          <div class="inline-flex items-center gap-x-1.5 text-sm text-blue-600 decoration-2 hover:underline font-medium">Restore</div>
                                        </a>
                                    </td>  
                                    <td class="h-px w-px whitespace-nowrap">
                                        <form method="post" action="{{route('admin.deleted-users.destroy', ['user'=>$user->id])}}" id="delete_{{$user->id}}">
                                            @csrf
                                            @method('get')
                                          <div class="px-6 py-1.5">
                                          <a class="inline-flex items-center gap-x-1.5 text-sm text-red-600 decoration-2 hover:underline font-medium" href="#" data-id="{{$user->id}}" onclick="deletePost(this)">Delete</a>
                                          </div>
                                        </form>
                                    </td>
                                    </tr>
                                @endforeach   
                                </tbody>
                                </table>
                                <!-- End Table -->
                    
                                <!-- Footer -->
                                <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-gray-700">
                                <div>
                                    <p class="text-sm">
                                    <span class="font-semibold">6</span> results
                                    </p>
                                </div>
                    
                                <div>
                                    <div class="inline-flex gap-x-2">
                                    <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:hover:bg-slate-800 dark:border-gray-700 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                        </svg>
                                        Prev
                                    </button>
                    
                                    <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:hover:bg-slate-800 dark:border-gray-700 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                        Next
                                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </button>
                                    </div>
                                </div>
                                </div>
                                <!-- End Footer -->
                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- End Table Section -->
                </div>
            </div>
        </div>
    </div>
<script>
    function deletePost(e){
        'use strict'
        if(confirm('本当に削除しても良いですか？')){
        document.getElementById('delete_'+e.dataset.id).submit();
        }
    }
</script>
</x-app-layout>
