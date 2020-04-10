<?php


namespace App\Http\Controllers\News;


use App\Models\News\Category;
use App\Http\Controllers\Controller;
use App\Models\News\News;

class CategoryController extends Controller
{
    public function index()
    {
        return view('news.category.index')->with('categories', Category::getCategories());
    }

    public function filterCategory(string $slug)
    {
        $category = Category::getCategoryBySlug($slug);
        $category = array_pop($category);

        if ($category !== null) {
            $news =  News::getNewsByCategoryId($category->id);
        }
        return view('news.index', [
            'news' =>$news ?? [],
            'category' =>$category
        ]);
    }
}
