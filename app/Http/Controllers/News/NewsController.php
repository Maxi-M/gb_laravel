<?php

namespace App\Http\Controllers\News;

use App\Category;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index')->with('news', News::getNews());
    }

    public function show(int $id)
    {
        return view('news.newsOne')->with('news', News::getNewsId($id));
    }

    public function add()
    {
        return view('news.add');
    }

    public function store()
    {
        //TODO: Получить данные из формы методом POST и сохраняем
    }
}
