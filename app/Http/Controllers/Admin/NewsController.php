<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News\Category;
use App\Models\News\News;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $news = News::query()->paginate(5);
        return view('admin.news.index')->with('news', $news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $news = null;
        $categories = Category::all();
        return view('admin.news.form', ['categories' => $categories, 'news' => $news]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
            $request->flash();

            $this->validate($request, News::rules());

            $model = new News();
            if ($model->fill($request->all())) {
                $url = null;
                if ($file = $request->file('image')) {
                    $path = Storage::putFile('public/images', $file);
                    $url = Storage::url($path);
                    $model->image = $url;
                }
                if($model->save()) {
                    return redirect()->route('admin.news.index')->with('status', 'Новость добавлена успешно');
                }
                return redirect()->route('admin.news.create');
            }
            return redirect()->route('admin.news.create');
    }

    /**
     * Display the specified resource.
     *
     * @param News $news
     * @return Factory|View
     */
    public function show(News $news)
    {
        return view('news.one')->with('news', $news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @param Request $request
     * @return Factory|View
     */
    public function edit(News $news, Request $request)
    {
        $categories = Category::all();
        return view('admin.news.form', ['categories' => $categories, 'news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param News $news
     * @param Request $request
     * @return RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(News $news, Request $request): RedirectResponse
    {
        $this->validate($request, News::rules());

        if ($news->fill($request->all()) && $news->save()) {
            return redirect()->route('admin.news.index')->with('status', 'Новость обновлена успешно');
        }
        return redirect()->route('admin.news.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(News $news): RedirectResponse
    {
        $img = '/storage/app/public/images/'. basename($news->image);
        $news->delete();
        // Не удаляет картинку... Есть ли правильный способ это сделать?
        //Storage::delete($img);
        //unlink($img);
        return redirect()->route('admin.news.index')->with('status', 'Новость удалена');
    }
}
