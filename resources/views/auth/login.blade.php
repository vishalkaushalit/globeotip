<x-guest-layout>
    <?php
    $pageTitle = 'Globeotrip - Login';
    $pageDescription = 'Explore and book flights, hotels, and holiday destinations around the world with Globeotrip.';
    ?>

    <section class="page-banner inner-banner">
        <div class="banner-overlay"></div>
        <div class="container banner-content text-center">
            <h1>Login</h1>
            <p>Sign in to access your account and manage your journey.</p>
        </div>
    </section>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="login_sec section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="d-block mt-1 w-100" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="d-block mt-1 w-100" type="password" name="password"
                                required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="d-block mt-4">
                            <label for="remember_me" class="d-inline-flex align-items-center">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-secondary text-primary shadow-sm" name="remember">
                                <span class="ms-2 small text-secondary">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="d-flex align-items-center justify-content-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="btn btn-text" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <button type="submit" class="btn btn-primary ms-3">
                                {{ __('Log in') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
