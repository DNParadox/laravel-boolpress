<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Post;
use App\Tag;

class HomeController extends Controller
{
    public function index() {

        $post = Post::find(2);
        $post->tags()->sync([2,3]); 
       

        $user = Auth::user();

        $data = [
            'user' => $user
        ];
        return view('admin.home', $data);
    }
}
