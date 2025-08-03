<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{

   public function __construct()
   {
       $this->middleware('auth.basic')->except(['index']);
   }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit=$request->input('limit');
        $limit=($limit>50) ? 50 : $limit;
      $user = UserResource::Collection(User::paginate($limit)) ;
        return $user->response()->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create',User::class);
      $user = new UserResource(User::create(
          [
              'name' => $request->name,
              'email'=> $request->email,
              'password'=>Hash::make($request->password)
          ]));
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
        $idUser=User::findOrFail($id);
        $this->authorize('update',$idUser);
        $User = new UserResource(User::findOrFail($id));
        $User->update($request->all());
        return $User->response()->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $idUser=User::findOrFail($id);
        $this->authorize('delete',$idUser);
        User::find($id)->delete();
        return 204;
    }
}
