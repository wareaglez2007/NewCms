<?php

use App\Post;

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
    return view('welcome');
});

//Route::get('/login',function(){
//    return view('login'); 
//});
//
//Route::get('/login', function(){
//
//	$names = [
//		"Rostom" => [
//			"Age" => "33",
//			"DOB" => "09/07/1984",
//			"Address" => "16008 Celtic Street",
//			"City" => "Granada Hills",
//			"State" => "CA",
//			"Zip" => "91344",
//			"phone" => "818-723-3190"
//		],
//				"Ro" => [
//			"Age" => "3",
//			"DOB" => "10/20/1980",
//			"Address" => "16008 Celtic Street",
//			"City" => "Granada Hills",
//			"State" => "CA",
//			"Zip" => "91344",
//			"phone" => "818-723-3190"
//		]
//	];
//
//	return view('login', compact('names', $names));
//});

Route::resource('login', 'PostsController@index');
/*
 * QUERY SAMPLES
 *
 */
//Sample of insert ORM Make sure the model has fillable overwritten 
Route::get('/insert', function() {

    $post = Post::create(['title' => 'post title2', 'content' => 'See the content22222222', 'author' => 'Rostom']);
});
//Sample Reads
Route::get('/read', function() {

    //This will return an STD Object Array []
    //[Model]::Get() => returns STD Object String
    //[Model]::where()->get();
    $read = Post::where('author', 'Rostom')->get();

    foreach ($read as $r):
        return $r->title;
    endforeach;
});
/*
 * This will delete (Soft ONLY)
 */
Route::get('/delete', function() {

    $del = Post::destroy(1);
});
/*
 * Show all record if using soft deletes 
 */
Route::get('/showall', function() {
    //Work around if we are using softDeletes in Post model and we are not able to use all() method from Eluquent
    $show = Post::where('deleted_at', NULL)->get();
//    return $show;
    foreach ($show as $s) {
        ?>

        <li> <?= $s->title ?></li>
        <?php
    }
});
/*
 * Force delete
 * This will permenantly delete a record
 */
Route::get('/forcedel', function(){
    $force = Post::withTrashed()->where('id',1)->forceDelete();
    
    return $force;
});
