<?php
namespace tuanlq11\laravelelastic;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;

class ElasticSearchHelper
{
    /** @var  ElasticSearchHelper */
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
     * @return ElasticSearchHelper
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            $connection = \Config::get('laravelelastic.connection');
            self::$instance = new ElasticSearchHelper($connection);
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

    /**
     * @return Client
     */
    public static function client()
    {
        return self::$instance->getClient();
    }
}