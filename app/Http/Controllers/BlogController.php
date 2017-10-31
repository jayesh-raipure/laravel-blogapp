<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
class BlogController extends Controller
{
	protected $limit = 3;
    public function index(){
    	$posts = Post::with('author')->latestFirst()->published()->Paginate($this->limit);
    	return view('blog.index', compact('posts'));
    }

    public function category($id){
    	$categoryName = Category::findorfail($id)->title;
    	
    	// $posts = Post::with('author')->latestFirst()->published()->where('category_id', $id)->Paginate($this->limit);
    	$posts = Category::find($id)->posts()->with('author')->latestFirst()->published()->Paginate($this->limit);
    	return view('blog.index', compact('posts', 'categoryName'));
    }

    public function show($id)
    {
    	$post = Post::published()->findorfail($id);
    	return view('blog.show', compact('post'));
    }
}
