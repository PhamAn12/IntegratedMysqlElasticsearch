<?php

namespace App;
use Elasticquent\ElasticquentTrait;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use ElasticquentTrait;
    protected $table = 'university';
    protected $fillable = ['university_name', 'city'];
    protected $mappingProperties = array(
        
        'university_name' => [
          'type' => 'text',
          "analyzer" => "standard",
        ],
        'city' => [
          'type' => 'text',
          "analyzer" => "standard",
        ],
    );
}
