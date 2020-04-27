<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News\Category;
use App\Models\News\News;
use Illuminate\Support\Carbon;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index()
    {
        $categories = Category::query()->where(['is_active' => true])->get();

        /** @var  Category $category */
        foreach ($categories as $category) {
            if (!empty($category->rss)) {
                try {
                    $xml = XmlParser::load($category->rss);
                    $news = $xml->parse([
                        'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate]']
                    ]);
                } catch (\Throwable $e) {
                    continue;
                }
                $newsAdded = 0;
                foreach ($news['news'] as $item) {
                    if (!News::query()->where(['guid' => $item['guid']])->first()) {
                        $pubDate = new Carbon($item['pubDate']);
                        $newsItem = new News();
                        $newsItem->fill([
                            'title' => $item['title'],
                            'category_id' => $category['id'],
                            'text' => $item['description'],
                            'posted_at' => $pubDate->toDateTime(),
                            'guid' => $item['guid'],
                            'link' => $item['link']
                        ]);
                        $newsItem->save();
                        $newsAdded++;
                    }
                }
            }
        }
    return redirect()->route('news.index')->with('status', 'Было найдено и добавлено '.$newsAdded.' новостей');
    }
}
