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
        return view('news.news.index')->with('news', News::getNews());
    }

    public function show(int $id)
    {
        return view('news.news.one')->with('news', News::getNewsId($id));
    }

    public function add()
    {
        return view('news.news.add');
    }

    public function store()
    {
        //TODO: Получить данные из формы методом POST и сохраняем
    }
}
