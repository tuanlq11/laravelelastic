<?php

namespace tuanlq11\laravelelastic;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use tuanlq11\laravelelastic\ElasticSearchHelper;

class ElasticSearchJob extends Job implements SelfHandling
{
    protected $params;
    protected $method;

    /**
     * elasticsearch constructor.
     * @param $method
     * @param $params
     */
    public function __construct($method, $params)
    {
        $this->params = $params;
        $this->method = $method;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $response = ElasticSearchHelper::client()->{$this->method}($this->params);
    }
}
