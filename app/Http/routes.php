<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	$valid_bquploads = App\User::valid_bquploads();
	$output = array();
	foreach ($valid_bquploads as $row) {
	    array_push($output, $row);
	}
    return view('welcome')->with('output',$output);
});
