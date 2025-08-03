<?php

use App\Http\Controllers\API\LessonController;
use App\Http\Controllers\API\TagController;
use App\Http\Controllers\API\UserController;
use App\Http\Middleware\onceBasic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

use App\Models\Lesson;
use App\Models\User;
use App\Models\Tag;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix(['v1'])->group(function () {

Route::apiResource('lessons', LessonController::class);

Route::apiResource('tags', TagController::class);

Route::apiResource('users', UserController::class);

Route::any('lesson' , function(){
     $message= "please make sure to update your code to use the newer version of your API.
                      you should use lessons instead of lesson";

     return Response::json([
           'data'=> $message,
             404
         ]

     );
});

//Route::redirect('lesson' , 'lessons');


    Route::get('users/{id}/lessons','API\RelationsipController@userLessons');

    Route::get('lessons/{id}/tags','API\RelationsipController@lessonTags');

    Route::get('tags/{id}/lessons' , 'API\RelationsipController@tagLessons');
});

/*
Route::domain('{{account}.mypp.com')->group(function(){
    Route::get('user/{id}',function($account , $id){
        //
    });

    Route::get('lessons/{lesson:slug}',function($lesson){
        return $lesson;
    });
});
*/

