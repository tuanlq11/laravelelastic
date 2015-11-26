<?php
namespace tuanlq11\laravelelastic;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;

class ElasticSearch
{
    /** @var  ElasticSearch */
    protected static $instance;
    /** @var  Client */
    protected $client;

    /**
     * ElasticSearch constructor.
     */
    public function __construct($connection)
    {
        $this->client = ClientBuilder::create()
            ->setHosts($connection['hosts'])
            ->setRetries($connection['retries'])
            ->build();
    }

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

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }
}