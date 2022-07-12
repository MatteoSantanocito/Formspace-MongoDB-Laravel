<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Support\Facades\Session;
use Request;

class PostController extends BaseController{

    public function getPosts($explorerMode = false){

        if($explorerMode){
            $posts = Post::limit(10)->get();
        } else {
            $posts = Post::where("username", session("username"))->get();
        }
        
        for($i = 0; $i < count($posts); $i++){
            $row = Like::where("user", session("username"))->where("post_id", $posts[$i]['id'])->first();
            if($row){
                $posts[$i]['ok'] = true;
            } else {
                $posts[$i]['ok'] = false;
            }
        }
        return $posts;
    }

    public function modifyPost(){
        $request = request();
        $post = Post::where("id", $request["id"])
        ->limit(1)
        ->update(array("title" => $request["title"], "content" => $request["comment"]));
        return redirect('home');
    }

    public function createPost(){
        //$user_id = (User::where('username', session("username"))->first())['id'];
        $request = request();
        $newPost = new Post;
        $newPost->title = $request['title'];
        $newPost->content = $request['comment'];
        $newPost->username = session("username");
        $newPost->num_likes = 0;
        $newPost->num_comments = 0;
        $newPost->save();

        if($newPost){
            return redirect('home');
        }

    }

    public function deletePost($id){
        $post = Post::where("id", $id)->first();
        $post->delete();
        return redirect('home');
    }

    public function addLike($user, $id){
        $like = new Like;
        $like->user = $user;
        $like->post_id = $id;
        $like->save();

        $likes = (Post::where("id", $id)->first())["num_likes"];
        return array("post_id"=>$id, "num_likes"=>$likes);
    }

    public function removeLike($user, $post_id){
        $like = Like::where("user", $user)->where("post_id", $post_id)->first();
        $like->delete();

        $likes = (Post::where("id", $post_id)->first())["num_likes"];
        return array("post_id"=>$post_id, "num_likes"=>$likes);
    }

    public function addcomment(){
        $request = request();

        $comment = new Comment;
        $comment->user = $request["user"];
        $comment->post_id = $request["post_id"];
        $comment->comment = $request["comment"];
        $comment->save();

        $i = Request::server('HTTP_REFERER');
        return redirect($i);
    }

    public function getComment($post_id){
        $comments = Comment::select("user", "comment")->where("post_id", $post_id)->get();
        
        return array("post_id" =>$post_id, "comments"=>$comments);
    }
}