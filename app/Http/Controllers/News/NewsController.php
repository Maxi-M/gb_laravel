<?php

namespace App\Http\Controllers\News;

use App\Models\News\Category;
use App\Http\Controllers\Controller;
use App\Models\News\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index')->with('news', News::getNews());
    }

    public function show(int $id)
    {
        $news = News::getNewsId($id);
        if (count($news) > 0) {
            return view('news.one')->with('news', $news[$id - 1]);
        }
        return redirect()->route('news.index');
    }

    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->flash();

            $model = new News();
            if ($model->load($request) && $model->save()) {
                return redirect()->route('news.index')->with('status', 'Новость добавлена успешно');
            }
            return redirect()->route('admin.newsAdd');
        }
    }
}
