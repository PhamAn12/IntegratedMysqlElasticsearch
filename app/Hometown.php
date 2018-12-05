<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;
class Hometown extends Model
{
    use ElasticquentTrait;
    protected $table = 'hometown';
    protected $fillable = ['id', 'name', 'street_address'];
    protected $mappingProperties = array(
        
        'name' => [
          'type' => 'text',
          "analyzer" => "standard",
        ],
        'street_address' => [
          'type' => 'text',
          "analyzer" => "standard",
        ],
    );
}
