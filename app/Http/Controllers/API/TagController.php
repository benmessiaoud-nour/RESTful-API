<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Resources\Tag as TagResource;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Tag= TagResource::collection(Tag::all());
        return $Tag->response()->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Tag=new TagResource(Tag::create($request->all()));
        return $Tag->response()->setStatusCode(200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
      $Tag=new TagResource(Tag::find($id));
        return $Tag->response()->setStatusCode(200,'Userreturned succefuly')
            ->header('additiona header', 'true');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $Tag = new TagResource(Tag::findOrFail($id));
        $Tag->update($request->all());
        return $Tag->response()->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Tag::find($id)->delete();
        return 204;
    }
}
