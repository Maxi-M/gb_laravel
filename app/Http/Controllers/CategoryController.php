<?php


namespace App\Http\Controllers;


use App\Category;
use App\News;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index')->with('categories', Category::getCategories());
    }

    public function filterCategory(string $name)
    {
        $category = Category::getCategoryByName($name);
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
