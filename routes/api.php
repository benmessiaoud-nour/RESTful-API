<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Lesson;

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

Route::get('lessons',function(){
    return \App\Models\Lesson::all();
});

Route::get('lessons/{id}', function($id){
    return \App\Models\Lesson::find($id);
});

Route::post('lessons' , function(Request $request){
    return Lesson::create($request->all());
});

Route::put('lessons/{id}', function(Request $request, $id){
   $Lesson =  Lesson::findOrFail($id);
   $Lesson->update($request->all());
   return $Lesson;
});

Route::delete('lessons/{id}' , function($id){
    \App\Models\Lesson::find($id)->delete();
    return 204;
});
