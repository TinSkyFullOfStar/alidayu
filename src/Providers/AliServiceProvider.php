<?php
/**
 *
 * Author:LittleStar of TinSky
 *
 * Created by PhpStorm.
 * User: TinSky
 * Date: 2016/9/16
 * Time: 21:02
 */

namespace TinSky\Providers;


use Illuminate\Support\ServiceProvider;
use TinSky\Application\Application;

class AliServiceProvider extends ServiceProvider
{
        public function boot()
        {
            $this->publishes([
                dirname(__DIR__).'/config.php' => config_path('aliSms.php'),
            ]);
        }

        public function register ()
        {
            $this->app->singleton(['TinSky\\Application\\Application' => 'alidayu'], function () {
                return new Application(config('aliSms'));
            });
        }
}