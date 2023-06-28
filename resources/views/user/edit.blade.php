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

        <form method="POST" action="{{ route('user.update', $user->id) }}">
            @csrf
            @method('put')
            Edit User Information
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" required />
            </div>

            <!--Phone Number -->
            <div class="mt-4">
                <x-label for="phoneNumber" :value="__('PhoneNumber')" />
                <x-input id="phoneNumber" class="block mt-1 w-full" type="tel" name="phoneNumber" value="{{ $user->phoneNumber }}" required />
            </div>
            
            <div class="mt-4 flex">
                <!--Gender-->
                <div class="mt-4">
                    <x-label for="gender" :value="__('Gender')" />
                    <div id="gender" class="flex flex-col mr-4">
                        <div class="flex">
                            <x-label for="male" :value="__('Male')" />
                            <x-input id="male" class="block mt-1 mr-2" type="radio" name="gender" value="Male" :checked="$user->gender === 'Male'" />
                        </div>
                        <div class="flex">
                            <x-label for="female" :value="__('Female')" />
                            <x-input id="female" class="block mt-1 mr-2" type="radio" name="gender" value="Female" :checked="$user->gender === 'Female'" />
                        </div>
                    </div>
                </div> 

                <!--status-->
                <div class="mt-4">
                    <x-label for="status" :value="__('Status')" />
                    <select id="status" name="status" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block">
                        <option value="">----</option>
                        <option value="Employee" {{ $user->status === 'Employee' ? 'selected' : '' }}>Employee</option>
                        <option value="Civil Servant" {{ $user->status === 'Civil Servant' ? 'selected' : '' }}>Civil Servant</option>
                        <option value="Self-employed" {{ $user->status === 'Self-employed' ? 'selected' : '' }}>Self-employed</option>
                        <option value="Student" {{ $user->status === 'Student' ? 'selected' : '' }}>Student</option>
                        <option value="Artist" {{ $user->status === 'Artist' ? 'selected' : '' }}>Artist</option>
                        <option value="Doctor" {{ $user->status === 'Doctor' ? 'selected' : '' }}>Doctor</option>
                        <option value="Lawyer" {{ $user->status === 'Lawyer' ? 'selected' : '' }}>Lawyer</option>
                        <option value="Teacher" {{ $user->status === 'Teacher' ? 'selected' : '' }}>Teacher</option>
                        <option value="Engineer" {{ $user->status === 'Engineer' ? 'selected' : '' }}>Engineer</option>
                        <option value="Salesperson" {{ $user->status === 'Salesperson' ? 'selected' : '' }}>Salesperson</option>
                        <option value="Other" {{ $user->status === 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
            </div>

         

            {{-- birthday --}}
            <div class="mt-4">
                <x-label for="birthday" :value="__('Birthday')" />
                <div id='birthday' class="flex">
                    {{-- year --}}
                    <div class="mr-4">
                        <select id="birth_year" name="birth_year" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block">
                        <option value="">Year</option>
                        @for ($year = 1920; $year <= date('Y'); $year++)
                            <option value="{{ $year }}" {{ $year === $user->birth_year ? 'selected' : '' }}>{{ $year }}</option>
                        @endfor
                        </select>
                    </div>
                    {{-- month --}}
                    <div class="mr-4">
                        <select id="birth_month" name="birth_month" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block">
                        <option value="">Month</option>
                        @for ($month = 1; $month <= 12; $month++)
                            <option value="{{ $month }}" {{ $user->birth_month == $month ? 'selected' : '' }}>{{ $month }}</option>
                        @endfor
                        </select>
                    </div>
                    {{-- day --}}
                    <div class="mr-4">
                        <select id="birth_day" name="birth_day" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block">
                        <option value="">Day</option>
                        @for ($day = 1; $day <= 31; $day++)
                            <option value="{{ $day }}" {{ $user->birth_day == $day ? 'selected' : '' }}>{{ $day }}</option>
                        @endfor
                        </select>
                    </div>
                </div>
            </div>
            
        
            
            

            <!--address-->
            <div class="mt-4">
                <x-label for="address" :value="__('Address')" />
                <x-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{ $user->address }}" required />
            </div>
                        
            <!-- Password -->
            <!-- 現在のパスワード -->
            <div class="mt-4">
                <x-label for="current_password" :value="__('Current Password')" />
                <x-input id="current_password" class="block mt-1 w-full" type="password" name="current_password" required />
            </div>

            <!-- 新しいパスワード -->
            <div class="mt-4">
                <x-label for="new_password" :value="__('New Password')" />
                <x-input id="new_password" class="block mt-1 w-full" type="password" name="new_password" />
            </div>

            <!-- 新しいパスワードの確認 -->
            <div class="mt-4">
                <x-label for="new_password_confirmation" :value="__('Confirm New Password')" />
                <x-input id="new_password_confirmation" class="block mt-1 w-full" type="password" name="new_password_confirmation" />
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Update') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
