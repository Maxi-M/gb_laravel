<?php


namespace App\Http\Controllers\News;


use App\Models\News\Category;
use App\Http\Controllers\Controller;
use App\Models\News\News;

class CategoryController extends Controller
{
    public function index()
    {
        return view('news.category.index')->with('categories', Category::query()->paginate(config('app.pageSize')));
    }

    public function filterCategory(string $slug)
    {
        $news = null;
        $category = Category::query()->where('slug', $slug)->first();
        if ($category !== null) {
            $news =  $category->news()->paginate(config('app.pageSize'));
        }
        return view('news.index', [
            'news' =>$news,
            'category' =>$category
        ]);
    }
}
