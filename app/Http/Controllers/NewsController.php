<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsFindRequest;
use App\Models\News;
use App\Service\SimilarNews;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        $news = News::query()->paginate(9);
        return view('pages.news.index', [
            'news' => $news,
        ]);
    }

    public function show(News $news) {
        $similar_news = (new SimilarNews())->getSimilarModels($news);
        return view('pages.news.show', [
            'news' => $news,
            'similar_news' => $similar_news,
        ]);
    }

    public function find(NewsFindRequest $request) {
        $request->flash();
        $request->validated();
        $search_value = '%' . $request->news_find . '%';
        $news = News::query()->where('title', 'like', $search_value)->paginate(9);
        return view('pages.news.index', [
            'news' => $news,
        ]);
    }
}
