<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use App\Quote;

$app->get('/', function () use ($app) {
    // return $app->welcome();

    /*
        * Picks a different quote every day 
        * (for a maximum of 366 quotes)
        *
        *   - $count: the total number of available quotes
        *   - $day: the current day of the year (from 0 to 365)
        *   - $page: the page to look for to retrieve the 
        *            correct record
        */
       $count = Quote::query()->get()->count();
       $day = (int) date('z');
       $page = $day % $count + 1;

       $quotes = Quote::query()->get()->forPage($page, 1)->all();

       if (empty($quotes)) {
           throw new \Illuminate\Database\Eloquent\ModelNotFoundException();
       }

       return view('quote', ['quote' => $quotes[0]]);
});

/**
 * Display a specific quote
 */
$app->get('/quote/{id}', function($id) use ($app) {
    $quote = Quote::query()->findOrFail($id);
    return view('quote', ['quote' => $quote]);
});

$app->get('/test', function () {
	echo 'ngetes doang ini...';
});

$app->get('peserta', 'PesertaController@index');

$app->group(['prefix' => 'api/article', 'namespace' => 'App\Http\Controllers'], function($app) 
{
  //untuk group harus pakai namespace
  $app->get('/','ArticleController@index');
   
  $app->get('/{id}','ArticleController@getArticle');
   
  $app->post('/','ArticleController@saveArticle');
   
  $app->put('{id}','ArticleController@updateArticle');
   
  $app->delete('{id}','ArticleController@deleteArticle');
});

// $app->get('api/article','ArticleController@index');
 
// $app->get('api/article/{id}','ArticleController@getArticle');
 
// $app->post('api/article','ArticleController@saveArticle');
 
// $app->put('api/article/{id}','ArticleController@updateArticle');
 
// $app->delete('api/article/{id}','ArticleController@deleteArticle');