<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Http\Resources\Lesson as LessonResource;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Lesson= LessonResource::collection(Lesson::all());
        return $Lesson->response()->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $Lesson=new LessonResource(Lesson::create($request->all()));
        return $Lesson->response()->setStatusCode(200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $Lesson=new LessonResource(Lesson::find($id));
        return $Lesson->response()->setStatusCode(200,'Userreturned succefuly')
            ->header('additiona header', 'true');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson , $id)
    {
        $Lesson = new LessonResource(Lesson::findOrFail($id));
        $Lesson->update($request->all());
        return $Lesson->response()->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       Lesson::find($id)->delete();
        return 204;
    }
}
