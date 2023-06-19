<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
class HomeController extends Controller
{
    function index(Request $request){
    	// $posts=Post::orderBy('id','desc')->simplePaginate(1);
    	if($request->has('q')){
    		$q=$request->q;
    		$posts=Post::where('title','like','%'.$q.'%')->orderBy('id','desc')->paginate(2);
    	}else{
    		$posts=Post::orderBy('id','desc')->paginate(2);
    	}
        return view('home',['posts'=>$posts]);
    }
    // Post Detail
    function detail(Request $request,$slug,$postId){
        // Update post count
        Post::find($postId)->increment('views');
    	$detail=Post::find($postId);
    	return view('detail',['detail'=>$detail]);
    }

    // All Categories
    function all_category(){
        $categories=Category::orderBy('id','desc')->paginate(5);
        return view('categories',['categories'=>$categories]);
    }

    // All posts according to the category
    function category(Request $request,$cat_slug,$cat_id){
        $category=Category::find($cat_id);
        $posts=Post::where('cat_id',$cat_id)->orderBy('id','desc')->paginate(2);
        return view('category',['posts'=>$posts,'category'=>$category]);
    }

    // Save Comment
    function save_comment(Request $request,$slug,$id){
        $request->validate([
            'comment'=>'required'
        ]);
        $data=new Comment;
        $data->user_id=$request->user()->id;
        $data->post_id=$id;
        $data->comment=$request->comment;
        $data->save();
        return redirect('detail/'.$slug.'/'.$id)->with('success','Comment has been submitted.');
    }

    // User submit post
    function save_post_form(){
        $cats=Category::all();
        return view('save-post-form',['cats'=>$cats]);
    }

    // Save Data
    function save_post_data(Request $request){
        $request->validate([
            'title'=>'required',
            'category'=>'required',
            'detail'=>'required',
        ]);

        $post=new Post;
        $post->user_id=$request->user()->id;
        $post->cat_id=$request->category;
        $post->title=$request->title;
        $post->detail=$request->detail;
        $post->tags=$request->tags;
        $post->status=1;
        $post->save();

        return redirect('save-post-form')->with('success','Post has been added');
    }

    // Manage Posts
    function manage_posts(Request $request){
        $posts=Post::where('user_id',$request->user()->id)->orderBy('id','desc')->get();
        return view('manage-posts',['data'=>$posts]);
    }

    function update(Request $request, User $user){
        $user->update([

            'name' => $request->name,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
            'location' => $request->location,
            'email' => $request->email,
            'updated_at' => now()

        ]);

        return $this->success('Profile Updated Succesfully!');

    }

}
