<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;
class Student extends Model
{
    use ElasticquentTrait;
    protected $table = 'student';
    protected $fillable = ['id', 'msv', 'student_name'];
    protected $mappingProperties = array(
        
        'msv' => [
          'type' => 'text',
          "analyzer" => "standard",
        ],
        'student_name' => [
          'type' => 'text',
          "analyzer" => "standard",
        ],
    );
}
