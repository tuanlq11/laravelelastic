<?php
namespace tuanlq11\laravelelastic;

use \Illuminate\Support\ServiceProvider;

class ElasticSearchProvider extends ServiceProvider
{

    /**
     *
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../config/config.php", "laravelelastic");
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $elasticsearch = ElasticSearch::getInstance();
    }
}