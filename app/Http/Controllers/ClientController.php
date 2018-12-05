<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;
use Elastica\Client as ElasticaClient;
class ClientController extends Controller
{
    protected $elasticsearch;
    protected $elastica;

    // public function __construct() {
    //     //$this->elasticsearch = ClientBuilder::create()->build();

    //     $elasticaConfig = [
    //         'host'=>'localhost',
    //         'post'=> 9200,
    //         'index'=>'btlhqt1'
    //     ];
    // //    $this->elastica = new ElasticaClient($elasticaConfig);

    // }
    public function getelasticsearchTest(){
        return view('ItemSearch');
    }
    public function postelasticsearchTest(Request $request) {

        //dump($this->elasticsearch);
        $client = ClientBuilder::create()->build();
        $id = $request->IdUniversity;
        $param = [
            'index' => 'btlhqt',
            'type'  => 'university',
            'id'   => '77373'
        ];
        $time_search = -microtime(true);
        $res = $client ->get($param);
        $time_search += microtime(true);
        dump($res);
       echo "<strong>Time Get</strong>";
        dump( 'Time get : '. $time_search. 'ms' );
        
        $param1 = [
            'index' => 'btlhqt',
            'type'  => 'university',
            'id'   => $id
        ];
        $res = $client ->get($param1);
        
        return view('result')->with(['res'=>$res,'milliseconds'=>$milliseconds]);
        
    }

    public function elasticsearchQuery() {
        $client = ClientBuilder::create()->build();
        $params = [
            'index' => 'btlhqt',
            'type'  => 'hometown',
            'size'  => 100,
            'body' => [
                'query' => [
                    'match' => [
                        'name' => 'Florida'
                    ]
                ]
            ]
        ];        
        
        $res = $client->search($params);
        
        dump($res);
        
        $milliseconds = $res['took'];
        dump('time taken: '.$milliseconds.'s');
        $params = [
            'index' => 'btlhqt',
            'type'  => 'university',
            'size'  => 10,
            'body' => [
                'query' => [
                    'match' => [
                        'about' => 'Coast'
                    ]
                ]
            ]
        ]; 
        $time_search = -microtime(true);
        $res = $client->search($params);
        $time_search += microtime(true);
        dump($res);
        dump('time taken: '.$time_search.'s');     


    }

    public function elasticsearchGet() {
        $client = ClientBuilder::create()->build();
        $param = [
            'index' => 'btlonhqt',
            'type'  => 'student',
            'id'   => '7000011'
        ];
        $time_search = -microtime(true);
        $res = $client ->get($param);
        $time_search += microtime(true);
        dump($res);
        dump('time taken : '.($time_search*1).' s');
    }

    public function elasticsearchUpdate() {
        $client = ClientBuilder::create()->build();
        $time_search = -microtime(true);
        $params = [
            'index' => 'btlonhqt',
            'type' => 'student',
            'id' => '7000011',
            'body' => [
                'doc' => [
                    'msv' => '16020829'
                ]
            ]
        ];        
        $response = $client->update($params);
        $time_search += microtime(true);
        dump($response);
        dump('time taken : '.($time_search*1).' s');
    
    }

    public function elasticsearchDelete() {
        $client = ClientBuilder::create()->build();
        $time_search = -microtime(true);
        $param1 = [
            'index' => 'btlonhqt',
            'type'  => 'student',
            'id'   => '54661'
        ];       
        $res = $client ->delete($param1);
        $time_search += microtime(true);
        dump('time taken : '.($time_search*1).' s');

    }

    public function elasticsearchInsert() {
        $client = ClientBuilder::create()->build();
        $time_search = -microtime(true);
         $param1 = [
            'index' => 'btlonhqt',
            'type' => 'student',
            'id'  =>'110000000',
            'body'=>[
                'student_name'=>'KhaBanh',
                'msv'=>'113113',
                'university_id'=>'34',
                'hometown_id'=>'93'
            ]
            
        ];
        
        
        $res = $client ->index($param1);
        $time_search += microtime(true);
        dump('time taken : '.($time_search*1).' s');
    }


}
