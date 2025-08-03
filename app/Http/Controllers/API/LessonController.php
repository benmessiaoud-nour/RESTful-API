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
    public function index(Request $request)
    {
        $limit=$request->input('limit');
        $limit=($limit>50) ? 50 : $limit;
        $Lesson= LessonResource::collection(Lesson::paginate($limit));
        return $Lesson->response()->setStatusCode(200);
    }

    public function store(Request $request)
    {
      $Lesson=new LessonResource(Lesson::create($request->all()));
        return $Lesson->response()->setStatusCode(200);
    }

    public function show($id)
    {
        $Lesson=new LessonResource(Lesson::find($id));
        return $Lesson->response()->setStatusCode(200,'User returned succefuly')
            ->header('additional header', 'true');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson , $id)
    {
        $id =Lesson::findOrFail($id);
        $this->authorize('update', $id);
        $Lesson = new LessonResource(Lesson::findOrFail($id));
        $Lesson->update($request->all());
        return $Lesson->response()->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $id =Lesson::findOrFail($id);
        $this->authorize('delete', $id);
       Lesson::find($id)->delete();
        return 204;
    }
}
