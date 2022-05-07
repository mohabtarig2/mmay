<?php

namespace App\Providers;

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();
        Broadcast::routes(['prefix'=>'api','middleware'=>['auth:sanctum','admins']]);
        Broadcast::routes(['middleware'=>['auth:admins']]);


        require base_path('routes/channels.php');
    }
}
