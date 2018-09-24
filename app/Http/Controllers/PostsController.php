<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
//use DB;

class PostsController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth',['except' => ['index', 'show']]);
  }


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // $posts = Post::all();
    // return view ('posts.index')->with('posts', $posts);

    //$posts = Post::all();
    // return Post::where('title','Post two')->get();
    //$posts = DB::select('SELECT * FROM posts');
    //$posts = Post::orderBy('created_at','desc')->take(2)->get();
    // $posts = Post::orderBy('created_at','desc')->get();

    $posts = Post::orderBy('created_at','desc')->paginate(2);
    return view ('posts.index')->with('posts',$posts);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view ('posts.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $this->validate($request,[
        'title' => 'required|min:3',
        'body' => 'required|min:10',
        'cover_image' => 'image|nullable|max:1999'
      ]);

      // Handle File Upload
      if($request->hasFile('cover_image')){
        // Get filename with the extensions
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        // Upload Image
        $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
      } else {
        $fileNameToStore = 'noimage.jpg';
      }

      // Create Post
      $post = new Post;
      $post->title = $request->input('title');
      $post->body = $request->input('body');
      $post->user_id = auth()->user()->id;//dodanie id użytkownika z danych autoryzacyjnych do bazy postów
      $post->cover_image = $fileNameToStore;
      $post->save();

      return redirect('/posts')->with('success', 'Wpis został dodany');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $post = Post::find($id);
    return view('posts.show')->with('post',$post);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $post = Post::find($id);

    // Check for correct user
    if(auth()->user()->id !==$post->user_id){
      return redirect('/posts')->with('error', 'Brak autoryzacji do edycji tej strony');
    }
    return view('posts.edit')->with('post',$post);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'title' => 'required|min:3',
      'body' => 'required|min:10'
    ]);

    // Handle File Upload
    if($request->hasFile('cover_image')){
      // Get filename with the extensions
      $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
      // Get just filename
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
      // Get just ext
      $extension = $request->file('cover_image')->getClientOriginalExtension();
      // Filename to store
      $fileNameToStore = $filename.'_'.time().'.'.$extension;
      // Upload Image
      $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
    }

    // Create Post
    $post = Post::find($id);
    $post->title = $request->input('title');
    $post->body = $request->input('body');
    if($request->hasFile('cover_image')){
      $post->cover_image = $fileNameToStore;
    }
    $post->save();

    return redirect('/posts')->with('success', 'Zmiany zostały zapisane');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $post = Post::find($id);
      // Check for correct user
      if(auth()->user()->id !==$post->user_id){
        return redirect('/posts')->with('error', 'Brak autoryzacji do usunięcia tej strony');
      }

      if($post->cover_image != 'noimage.jpg'){
        // Delete image
        Storage::delete('public/cover_images/'.$post->cover_image);
      }

      $post->delete();
      return redirect('/posts')->with('success', 'Post usunięto');
  }
}
