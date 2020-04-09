<?php


namespace App\Http\Controllers;


use App\Models\News\Category;

class AdminController extends Controller
{
    public function addNews()
    {
        $categories = Category::getCategories();
        return view('admin.addNews', ['categories' => $categories]);
    }
}
