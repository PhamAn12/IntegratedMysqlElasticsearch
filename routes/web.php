<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\University;
use App\Hometown;
use App\Student;
Route::get('/', function () {


   //Hometown::createIndex($shards = 3, $replicas = 1);
    
    for($i=0;$i<700;$i++){
        $temp1=$i*100000;
        $temp2=($i+1)*100000;
        $data = App\Student::where('id', '>', $temp1)->where('id','<',$temp2+1)->get();
        $data->addToIndex();
        //dump($data);
    }
    return view('welcome');

});

Route::get('/home',function() {
    return view('home');
});

  Route::prefix('elasticsearch')->group(function(){
  //  Route::get('test',['uses'=>'ClientController@elasticsearchTest']);
    Route::get('query',['uses'=>'ClientController@elasticsearchQuery']);
    Route::get('get',['uses'=>'ClientController@elasticsearchGet']);
    Route::get('delete',['uses'=>'ClientController@elasticsearchDelete']);
    Route::get('update',['uses'=>'ClientController@elasticsearchUpdate']);
    Route::get('insert',['uses'=>'ClientController@elasticsearchInsert']);
  });

  
Route::prefix('elasticsearch')->group(function(){
    Route::get('test',['uses'=>'ClientController@getelasticsearchTest']);
    Route::post('test',['uses'=>'ClientController@postelasticsearchTest']);
  });