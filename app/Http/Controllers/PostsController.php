<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Discussion;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class PostsController extends Controller
{
    use AuthenticatesUsers;


    protected $redirectTo = '/';

    public function __construct()
    {
//        $this->middleware('auth:web')->only(['create','store','edit','update']);
//        $this->middleware('auth');
        if (Auth::check()) {
            return redirect('/user/register');
        }
        var_dump(Auth::id());
        var_dump(Auth::check());
//        return redirect('/user/login');
        var_dump(123);
    }

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
    /*
     * 创建帖子
     * */
    public function create()
    {
        return view('forum.create');
    }
    /*
     * 对帖子处理
     * */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        $data = [
            'user_id' => Auth::id(),
            'last_user_id' => Auth::id()
        ];
        $discussion = Discussion::create(array_merge($request->all(),$data));

        return redirect()->action('PostsController@show', ['id' => $discussion->id]);
    }
}
