<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        // Fortify::redirectUserForTwoFactorAuthenticationUsing(RedirectIfTwoFactorAuthenticatable::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())) . '|' . $request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        /*
        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
        */

        // Define the view for the login page
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // Define the view for the registration page
        Fortify::registerView(function () {
            return view('auth.register');
        });

        // Define the view for the password reset page

        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password');
        });

        // Define the view for the password reset confirmation page

        Fortify::resetPasswordView(function (Request $request) {
            return view('auth.reset-password', ['request' => $request]);
        });

        // TODO: Define the view for the email verification page
        // https://laravel.com/docs/12.x/fortify#email-verification
        // Define the view for the email verification page
        Fortify::verifyEmailView(function () {
            return view('auth.verify-email');
        });


        // Define the view for the password confirmation page
        // https://laravel.com/docs/12.x/fortify#password-confirmation
        /* Fortify::confirmPasswordView(function () {
            return view('auth.confirm-password');
        }); */
    }
}
