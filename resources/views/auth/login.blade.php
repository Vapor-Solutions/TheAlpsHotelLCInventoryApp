<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="card-body">
            <x-validation-errors class="mb-3 rounded-0" />

            @if (session('status'))
                <div class="alert alert-success mb-3 rounded-0" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required
                        autofocus autocomplete="username" />
                </div>

                <div class="mb-3">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="password"
                        name="password" required autocomplete="current-password" />
                </div>

                <div class="mb-3">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="mb-0">
                    <div class="d-flex justify-content-start align-items-baseline">
                        @if (Route::has('password.request'))
                            <a class="text-muted " href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-button class="ml-auto">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
