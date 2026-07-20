<x-guest-layout>
    <?php
    $pageTitle = 'Globeotrip - Confirm Password';
    $pageDescription = 'Confirm your Globeotrip account password before continuing.';
    ?>

    <section class="page-banner inner-banner">
        <div class="banner-overlay"></div>
        <div class="container banner-content text-center">
            <h1>Confirm Password</h1>
            <p>Confirm your password to continue securely.</p>
        </div>
    </section>

    <section class="login_sec section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="mb-4 small text-secondary">
                        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                    </div>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <!-- Password -->
                        <div>
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="d-block mt-1 w-100" type="password" name="password"
                                required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Confirm') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
