<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $user = UserResource::Collection(User::all()) ;
        return $user->response()->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $user = new UserResource(User::create($request->all()));
        return $user->response()->setStatusCode(200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       $user = new UserResource(User::findOrFail($id));
       return $user->response()->setStatusCode(200,'Userreturned succefuly')
     ->header('additiona header', 'true');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $User = new UserResource(User::findOrFail($id));
        $User->update($request->all());
        return $user->response()->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return 204;
    }
}
