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
        if ($category !== null) {
            $news =  News::getNewsByCategoryId($category['id']);
            $category_name = $category['text'];
        }

        return view('news.index', [
            'news' =>$news ?? [],
            'category_name' =>$category_name ?? null
        ]);
    }
}
