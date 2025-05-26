<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            {{-- <x-authentication-card-logo /> --}}
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <!-- Last Name -->
            <div class="mt-4">
                <x-label for="last_name" value="Last Name" />
                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required />
            </div>

            <!-- Username -->
            <div class="mt-4">
                <x-label for="username" value="Username" />
                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required />
            </div>

            {{-- <div class="form-group row">
                <label for="nationality_id" class="col-md-4 col-form-label">Nationality</label>

                <div class="col-md-6">
                    <select id="nationality_id" class="form-control" name="nationality_id">
                        <option value="" disabled >
                            -- Please select a Nationality --
                        </option>
                        @foreach($nationalities as $nationality)
                            <option value="{{ $nationality->id }}" {{ old('nationality_id') == $nationality->id ? 'selected' : '' }}>
                                {{$nationality->name}} | {{ $nationality->phone_code }}
                            </option>
                        @endforeach
                    </select>
                    @error('nationality_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div> --}}

            <div class="mt-4">
                <x-label for="nationality_id" value="Nationality" />
                <select id="nationality_id" name="nationality_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="" disabled {{ old('nationality_id') ? '' : 'selected' }}>-- Please select a Nationality --</option>
                    @foreach($nationalities as $nationality)
                        <option value="{{ $nationality->id }}" {{ old('nationality_id') == $nationality->id ? 'selected' : '' }}>
                            {{ $nationality->name }} | +{{ $nationality->phone_code }}
                        </option>
                    @endforeach
                </select>
                @error('nationality_id')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <x-label for="phone" value="Phone" />
                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" />
            </div>


            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            {{-- <div class="form-group row">
                <label for="currency_id" class="col-md-4 col-form-label">Currency</label>

                <div class="col-md-6">
                    <select id="currency_id" class="form-control" name="currency_id">
                        <option value="" disabled >
                            -- Please select a currency --
                        </option>
                        @foreach($currencies as $currency)
                            <option value="{{ $currency->id }}" {{ old('currency_id') == $currency->id ? 'selected' : '' }}>
                                {{ $currency->symbol }}
                            </option>
                        @endforeach
                    </select>
                    @error('currency_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div> --}}

            <div class="mt-4">
                <x-label for="currency_id" value="Currency" />
                <select id="currency_id" name="currency_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="" disabled {{ old('currency_id') ? '' : 'selected' }}>-- Please select a Currency --</option>
                    @foreach($currencies as $currency)
                        <option value="{{ $currency->id }}" {{ old('currency_id') == $currency->id ? 'selected' : '' }}>
                            {{ $currency->code }} {{ $currency->symbol }}
                        </option>
                    @endforeach
                </select>
                @error('currency_id')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
