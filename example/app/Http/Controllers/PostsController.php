<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;

class PostsController extends Controller
{
  
    
    public function index()
    {
        
        $posts=Post::with(['user'])->get();

        return $posts;
    }

  
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $request->user_id;
        $post->save();

        if($request->expectsJson())
        {
            $res=[];
            $res['result_code']=0;
            $res['message']="Post Created";
            $res['data']=$post;
    
            return $res;
        }
       
            return $post;   

    }
   
    public function show(Request $request ,$id)
    {
        $post = Post::find($id);       

        if(!$post)
        {
            $res=[];
            $res['result_code']=2;
            $res['message']="Post with ID {$id} not found.";
            $res['data']=$post;
    
            return $res;
        }

        return $post;           
      
    }


        public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        if($request->expectsJson())
        
        {
            $res=[];
            $res['result_code']=0;
            $res['message']="Post Updated";
            $res['data']=$post;
    
            return $res;
        }
       
            return $post;
    }

    public function destroy(string $id)
    {
        $post = Post::find($id);
        if(!$post)
        {
            $res=[];
            $res['result_code']=2;
            $res['message']="Post with ID {$id} not found.";
            $res['data']=$post;
    
            return $res;
        }
        $post->delete();

        return response()->json([
            'result_code' => 0,
            'message' => 'Post deleted',
            'data' => null
        ]);
    }
}
