<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $favorite_news = News::query()->where('favorites', '=', 1)->paginate(9);
        return $this->returnView('pages.index', [
            'news' => $favorite_news
        ]);
    }
}
