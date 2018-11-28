<?php

namespace App\Models;

use Elasticsearch\Client;
use Isswp101\Persimmon\DAL\ElasticsearchDAL;
use Isswp101\Persimmon\ElasticsearchModel as Model;
use Isswp101\Persimmon\Event\EventEmitter;

class ElasticSearchModel extends Model
{
    public function __construct(array $attributes = [])
    {
        $dal = new ElasticsearchDAL($this, app(Client::class), app(EventEmitter::class));

        parent::__construct($dal, $attributes);
    }

    public static function createInstance()
    {
        return new static();
    }
}
