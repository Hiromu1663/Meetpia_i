<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Contact List
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
                              <!-- Table -->
                              <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                              <thead class="bg-gray-50">
                                  <th scope="col" class="px-6 py-3 text-left h-px w-px whitespace-nowrap">
                                      <div class="flex items-center gap-x-2">
                                      <span class="text-xs font-semibold uppercase tracking-wide">
                                          Contact Id
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
                                    <span class="text-xs font-semibold uppercase tracking-wide">
                                        Message
                                    </span>
                                    </div>
                                </th>

                                  <th scope="col" class="px-6 py-3 text-left">
                                      <div class="flex items-center gap-x-2">
                                      <span class="text-xs font-semibold uppercase tracking-wide">
                                          Created Date
                                      </span>
                                      </div>
                                  </th>

                                  <th scope="col" class="px-6 py-3 text-right"></th>
                                  </tr>
                              </thead>
                              @foreach($contacts as $contact)

                              <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                  <tr>
                                      <th scope="col" class="px-6 py-3 text-left">
                                          <div class="py-3 flex items-center gap-x-2">
                                              <span class="text-xs font-semibold uppercase tracking-wide">{{ $contact->id }}</span>
                                          </div>
                                      </th>
                                      <td class="h-px w-px whitespace-nowrap">
                                          <div class="pl-6 lg:pl-3 xl:pl-0 pr-6 py-3">
                                              <div class="flex items-center gap-x-3">
                                                  <div class="grow">
                                                      <span class="block text-sm font-semibold">{{ $contact->name }}</span>
                                                      <span class="block text-sm text-gray-500">{{ $contact->email }}</span>
                                                  </div>
                                              </div>
                                          </div>
                                      </td>
                                  <td class="h-px w-72 whitespace-nowrap">
                                      <div class="px-6 py-3">
                                      <span class="block text-sm font-semibold">{{ $contact->message }}</span>
                                      </div>
                                  </td>
                                  <td class="h-px w-px whitespace-nowrap">
                                    <div class="px-6 py-1.5">
                                    <a href="{{}}" class="inline-flex items-center gap-x-1.5 text-sm text-blue-600 decoration-2 hover:underline font-medium">Detail</a>
                                    </div>
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
</x-app-layout>
