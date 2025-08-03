<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Lesson;
use App\Models\User;
use App\Models\Tag;

class RelationshipController extends Controller
{
   public function userLessons ($id){
       try {
           $user = User::findOrFaill($id)->lessons;
           $fields=array();
           $filtered=array();
           foreach($user as $lesson)
           {
               $fields['title'] = $lesson->title;
               $fields['content'] = $lesson->body;
               $filtered[] = $fields;
           }

           return Response::json([
               'data' => $filtered,

           ],200);
       }catch(ModelNotFoundException $e){
        return Response::json([
            'error'=>[
                'message'=>'Lessons or user does not exist'
            ]

        ],200);
       }

   }

   public function lessonTags($id){
       $lesson = Lesson::find($id)->tags;

       $fields=array();
       $filtered=array();
       foreach($lesson as $tag)
       {
           $fields['tag'] = $tag->name;
           $filtered[] = $fields;
       }
       return $filtered;
   }

   public function tagLessons($id){
       $tag = Tag::find($id)->lessons;
       $fields=array();
       $filtered=array();
       foreach($tag as $lesson)

           $fields['title'] = $lesson->title;
           $fields['content'] = $lesson->body;
           $filtered[] = $fields;
       }
       return $filtered;
   }
}
