<?php

namespace App\Providers;

use App\Models\Attendee;
use App\Models\Event;
use App\Policies\AttendeePolicy;
use App\Policies\EventPolicy;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\RateLimiter;
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
//        Gate::define('update-event', function ($user, Event $event) {
//            return $user->id === $event->user_id;
//        });
//
//        Gate::define('delete-attendee', function ($user, Event $event, Attendee $attendee) {
//            return $user->id === $event->user_id ||  $user->id  === $attendee->user_id;
//        });

        Gate::policy(Event::class, EventPolicy::class);
        Gate::policy(Attendee::class, AttendeePolicy::class);

        RateLimiter::for('api', function (Request $request) {
            return [
                Limit::perMinute(1)->by('minute:'.$request->user()?->id ?: $request->ip()),
                Limit::perDay(1000)->by('day:'.$request->user()?->id ?: $request->ip()),
            ];
        });
    }
}
