<?php

namespace App\Http\Controllers\WebControllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Blog;
class ProfileController extends Controller
{
    public function Profile() {
        $user = Auth::user();
        $posts = Blog::orderBy('created_at', 'desc')->take(2)->get();
        
        return view('web-page.profile.index', ['user' =>  $user, 'posts' => $posts]);
    }
}
