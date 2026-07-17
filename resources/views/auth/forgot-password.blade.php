<x-guest-layout>
    <?php
    $pageTitle = 'Globeotip - Forgot Password';
    $pageDescription = 'Request a Globeotip password reset link to regain access to your account.';
    ?>

    <section class="page-banner inner-banner">
        <div class="banner-overlay"></div>
        <div class="container banner-content text-center">
            <h1>Forgot Password</h1>
            <p>Request a secure link to reset your account password.</p>
        </div>
    </section>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="login_sec section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="mb-4 small text-secondary">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="d-block mt-1 w-100" type="email" name="email"
                                :value="old('email')" required autofocus />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="d-flex align-items-center justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Email Password Reset Link') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
