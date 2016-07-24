<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
{
    //
    public function index(Request $request)
    {
        $articles = Article::paginate(config('params.pageRows'));
        return view('admin/article/index',['articles' => $articles]);
    }

    public function create()
    {
        return view('admin/article/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:articles|max:255',
            'body' => 'required',
        ]);

        $article = new Article;
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->user_id = $request->user()->id;

        if ($article->save()) {
            return redirect('admin/article');
        } else {
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }

    public function show()
    {
        echo 'this show';
    }
}
