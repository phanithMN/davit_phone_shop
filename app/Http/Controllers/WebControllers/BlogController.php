<?php

namespace App\Http\Controllers\WebControllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\ProductType;
use App\Models\Category;

class BlogController extends Controller
{
    public function Blog() {
        $blogs = Blog::paginate(4);
        $brands = Brand::all();
        $products_type = ProductType::all();
        $categories = Category::all();
        $posts = Blog::orderBy('created_at', 'desc')->take(3)->get();

        return view('web-page.blog.blog', 
        [
            'blogs' => $blogs,
            'brands' => $brands,
            'products_type' => $products_type,
            'categories' => $categories,
            'posts' => $posts
        ]);
    }

    public function BlogDetail($id) {
        $blog = Blog::findOrFail($id);
        $brands = Brand::all();
        $products_type = ProductType::all();
        $categories = Category::all();
        $posts = Blog::orderBy('created_at', 'desc')->take(3)->get();


        return view('web-page.blog.blog-detail', 
        [
            'blog'=>$blog,
            'brands' => $brands,
            'products_type' => $products_type,
            'categories' => $categories,
            'posts' => $posts
        ]);
    }
}
