<?php
namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Blade::component('input-label', \App\View\Components\InputLabel::class);
        Blade::component('text-input', \App\View\Components\TextInput::class);
        Blade::component('primary-button', \App\View\Components\PrimaryButton::class);
        Blade::component('input-error', \App\View\Components\InputError::class);
        Blade::component('guest-layout', \App\View\Components\GuestLayout::class);

    }
}
