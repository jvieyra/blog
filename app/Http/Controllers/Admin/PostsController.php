<?php
namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller{

	public function index(){
		$posts = Post::all();
		return view('admin.posts.index',compact('posts'));
	}

	public function create(){
		$categories = Category::all();
		$tags = Tag::all();
		return view('admin.posts.create',compact('categories','tags'));
	}

	public function store(Request $request){

		//dd($request->filled('published_at'));
		$this->validate($request,[
			'title' => 'required',
			'body' => 'required',
			'category' => 'required',
			'tags' => 'required',
			'excerpt' => 'required'
		]);

		//Post::create();
		//return $request;
		$post = new Post;
		$post->title = $request->title;
		$post->body = $request->body;
		$post->excerpt = $request->excerpt;
		$post->published_at = $request->filled('published_at') ? Carbon::parse($request->get('published_at')) : null;
		$post->category_id = $request->category;
		$post->save();

		//etiquetas
		$post->tags()->attach($request->tags);

		return back()->with('flash','Tu publicación ha sido creada');




	}

}
