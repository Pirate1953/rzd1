<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Type' => 'App\Policies\TypePolicy',
        'App\Zone' => 'App\Policies\ZonePolicy',
        'App\Station' => 'App\Policies\StationPolicy',
        'App\Ticket' => 'App\Policies\TicketPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        // Ограничить срок действия токена доступа 15 сутками
        Passport::tokensExpireIn(now()->addDays(15));

        // Ограничить срок действия токена обновления (перевыпуска) токена доступа 30 сутками
        Passport::refreshTokensExpireIn(now()->addDays(30));
    }
}
