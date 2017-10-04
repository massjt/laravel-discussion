<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Discussion;

class PostsController extends Controller
{
    /*
        帖子首页
    */
    public function index()
    {
        $discussions = Discussion::all();
        return view('forum.index', compact('discussions'));
    }
    /*
     * 展示单个帖子
     * */
    public function show($id)
    {
        $discussion = Discussion::findOrFail($id);
        return view('forum.show', compact('discussion'));
    }
}
