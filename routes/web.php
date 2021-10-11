<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});


//Route for Survey
$router->post('/survey', 'SurveyController@create');
$router->get('/survey', 'SurveyController@index');
$router->get('/survey/{id}', 'SurveyController@show');
$router->put('/survey/{id}', 'SurveyController@update');
$router->delete('/survey/{id}', 'SurveyController@delete');

//Route for Auth
$router->post('/register', 'UserController@register');
$router->post('/login', 'UserController@login');
$router->get('/users', 'UserController@index');



// Route::get('/', function () {
//     $response = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
//     $data = $response->json();
//     dd($data);
// });
