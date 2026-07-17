<x-guest-layout>
    <?php
    $pageTitle = 'Globeotip - Verify Email';
    $pageDescription = 'Verify your email address to finish setting up your Globeotip account.';
    ?>

    <section class="page-banner inner-banner">
        <div class="banner-overlay"></div>
        <div class="container banner-content text-center">
            <h1>Verify Email</h1>
            <p>Verify your email address to finish setting up your account.</p>
        </div>
    </section>

    <section class="login_sec section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="mb-4 small text-secondary">
                        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                    </div>

                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 fw-medium small text-success">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </div>
                    @endif

                    <div class="mt-4 d-flex align-items-center justify-content-between">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <div>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Resend Verification Email') }}
                                </button>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="btn btn-text">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
