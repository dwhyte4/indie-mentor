<x-guest-layout>
    <script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
            <img src="logo/Indie Mentor Logo Transparent.svg" class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="firstname" :value="__('First Name')" />

                <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus />
            </div>

            <!-- Middle Name -->
            <div>
                <x-label for="middlename" :value="__('Middle Name')" />

                <x-input id="middlename" class="block mt-1 w-full" type="text" name="middlename" :value="old('middlename')"  />
            </div>

            <!-- Last Name -->
            <div>
                <x-label for="lastname" :value="__('Last Name')" />

                <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')"  />
            </div>

            <!-- Artist Name -->
            <div>
                <x-label for="artistname" :value="__('Artist Name')" />

                <x-input id="artistname" class="block mt-1 w-full" type="text" name="artistname" :value="old('artistname')"  />
            </div>

            <!-- Select a Subcription Plan -->
            <div>    
                <x-label for="plans" :value="__('Subcription Plan')" />
                <div> 
                    <select class="form-control"  name="plan_id" required focus>
                        <!-- create seeders toload plan id  -->
                        @foreach ($plans as $plan =>$plan_name)
                        <option value="{{$plan}}" {{($selectedID) ? 'selected' : '' }}>
                            {{$plan_name}}
                            
                        </option>  
                        @endforeach      
                       
                    </select>
                </div>
            </div>
            
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
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
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
