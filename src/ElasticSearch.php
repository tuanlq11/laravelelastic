<?php
namespace tuanlq11\laravelelastic;

class ElasticSearch
{
    protected static $instance;

    /**
     * @return ElasticSearch
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            $connection = \Config::get('laravelelastic.connection');
            self::$instance = new ElasticSearch($connection);
        }

        return self::$instance;
    }


}