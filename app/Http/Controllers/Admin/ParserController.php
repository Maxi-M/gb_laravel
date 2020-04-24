<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index()
    {
        //$xml = XmlParser::load('https://news.yandex.ru/army.rss');
        $xml = XmlParser::load('https://news.yandex.ru/auto.rss');
        dd($xml);
    }
}
