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

$app->group(['namespace' => 'App\Http\Controllers'], function($group) {
	$group->get('/', [
		'as' => 'home', 'uses' => 'PageController@getLanding'
	]);

	$group->get('{page}', 'PageController@getPage');

	$group->post('services/{servicename}','ServiceController@getService');
});


