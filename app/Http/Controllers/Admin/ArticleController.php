<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
{
    //
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $order_name = Input::get("sidx")?Input::get("sidx"):'id';
            $rows =Input::get("rows");
            $offset = (Input::get("page") - 1) * Input::get("rows");
            $artcle = Article::orderBy($order_name, Input::get("sort",'desc'))->take($rows)->offset($offset)->get();
            $all_count = Article::count();
            $re_data = [
                    'total' => ceil($all_count/$rows),
                    'page' => Input::get("page",1),
                    'records' => $all_count,
                    'userdata' => [],
                    'rows' => $artcle->jsonSerialize()
                ];
            return response()->json($re_data);
        } else {
            return view('admin/article/index')->withArticles(Article::all());
        }
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
