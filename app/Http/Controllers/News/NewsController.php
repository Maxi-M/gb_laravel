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
        $news = News::query()->paginate(5);

        return view('news.index')->with('news', $news);
    }

    public function show(News $news)
    {
        return view('news.one')->with('news', $news);
    }


}
