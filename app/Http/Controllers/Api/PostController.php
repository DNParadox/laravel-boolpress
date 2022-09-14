<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
        // A differenza di all() , paginate() rende possibile la visualizzazioni di X pagine determinate
        $posts = POST::paginate(6);

        $data = [
            'success' => true,
            'results' => $posts
        ];

        // Sintassi per poter creare un file Json
        return response()->json($data);
    }

    public function show($slug) {

        // Cercare nel database il post con colonna slug = $slug
        $post = Post::where('slug', '=', $slug)->with(['tags', 'category'])->first();

       if($post){
            $data = [
                'success' => true,
                'results' => $post
            ];
       } else {
            $data = [
                'success' => false
            ];
       }

        return response()->json($data);
    }
}
