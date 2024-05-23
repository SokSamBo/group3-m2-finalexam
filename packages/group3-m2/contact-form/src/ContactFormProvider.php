<?php
namespace Group3M2\ContactForm;

use Illuminate\Support\ServiceProvider;

class ContactFormServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'contactform');
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/contactform'),
        ], 'views');
        
        $this->publishes([
            __DIR__.'/../config/contactform.php' => config_path('contactform.php'),
        ], 'config');
    }

    public function register()
    {
        // Register any package services
        $this->mergeConfigFrom(
            __DIR__.'/../config/contactform.php', 'contactform'
        );
    }
}