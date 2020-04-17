<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News\Category;
use App\Models\News\News;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $categories = Category::query()->paginate(config('app.pageSize'));
        return view('admin.category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $category = new Category();
        return view('admin.category.form', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->flash();

        $this->validate($request, Category::rules());

        $model = new Category();
        $model->fill($request->all());

        if ($model->save()) {
            return redirect()->route('admin.category.index')->with('status', 'Категория добавлена успешно');
        }
        return redirect()->route('admin.category.create');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return RedirectResponse
     */
    public function show(Category $category): RedirectResponse
    {
        return redirect()->route('news.byCategory', $category->slug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Factory|View
     */
    public function edit(Category $category)
    {
        return view('admin.category.form', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->flash();

        $this->validate($request, Category::rules());
        $category->fill($request->all());

        if ($category->save()) {
            return redirect()->route('admin.category.index')->with('status', 'Категория обновлена успешно');
        }
        return redirect()->route('admin.category.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->news()->delete();
        $category->delete();
        return redirect()->route('admin.category.index')->with('status', 'Категория и все относящиеся к ней новости удалены');
    }
}
