<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;


use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider
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

        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Join Our Camera Rental Community')
                ->line('Thank you for signing up for our camera rental service.')
                ->action('Verify Email Address', $url)
                ->line('We’re excited to have you as a part of our community!');
        });

        Vite::prefetch(concurrency: 3);
    }
}
