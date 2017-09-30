<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    /*
        帖子首页
    */
    public function index()
    {
        return view('fourm.index');
    }
}
