<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('user.register') }}" enctype="multipart/form-data">
            @csrf
            ユーザー用
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!--Phone Number -->
            <div class="mt-4">
                <x-label for="phoneNumber" :value="__('PhoneNumber')" />
                <x-input id="phoneNumber" class="block mt-1 w-full" type="tel" name="phoneNumber" :value="old('phoneNumber')" required />
            </div>
            

            <!--Gender-->
            <div class="mt-4 flex">
                <div class="mr-4">
                    <x-label for="gender" :value="__('Gender')" />
                    <div id="gender" class="flex">
                        <x-label for="male" :value="__('Male')" />
                        <x-input id="male" class="block mt-1 mr-2" type="radio" name="gender" value="Male" />
                        <x-label for="female" :value="__('Female')" />
                        <x-input id="female" class="block mt-1 mr-2" type="radio" name="gender" value="Female" />
                    </div>
                </div>            
    
                <!--age-->
                <div class="">
                    <x-label for="age" :value="__('Age')" />
                    <x-input id="age" class="block h-6" type="number" name="age" min="18" max="100" :value="old('age')" required />
                </div>

            </div>
            
            

            <!--address-->
            <div class="mt-4">
                <x-label for="address" :value="__('Address')" />
                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
            </div>
            
    
            <!--avatar-->
            <div class="mt-4">
                <x-label for="avatar" :value="__('Avatar')" />
                <x-input id="avatar" class="block mt-1 w-full" type="file" name="avatar" :value="old('avatar')" />
            </div>

             <!--status-->
            <!--status-->
            <div class="mt-4">
                <x-label for="status" :value="__('Status')" />
                <select id="status" name="status" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block">
                    <option value="">職業を選択してください</option>
                    <option value="Employee">Employee</option>
                    <option value="Civil Servant">Civil Servant</option>
                    <option value="Self-employed">Self-employed</option>
                    <option value="Student">Student</option>
                    <option value="Artist">Artist</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Lawyer">Lawyer</option>
                    <option value="Teacher">Teacher</option>
                    <option value="Engineer">Engineer</option>
                    <option value="Salesperson">Salesperson</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('user.login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
