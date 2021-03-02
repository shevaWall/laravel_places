<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Photo;
use App\Models\Video;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index(){
        $comment = Comment::find(2);
        dump($comment);
        dump($comment->commentable);
    }

    public function videoComments($id){
        $video = Video::findOrFail($id);

        dump($video->comments);
    }

    public function videoComment(){
        $video = Video::find(1);
        $video->comments()->create([
            'comment' => "Простой комментарий",
        ]);
        dump($video->comments);
    }

    public function photoComment(){
        $photo  =   Photo::find(1);
        $photo->comments()->create([
            'comment' => 'Комментарий для фото',
        ]);
    }
}
