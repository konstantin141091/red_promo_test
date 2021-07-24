<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsFindRequest;
use App\Models\News;
use App\Service\SimilarNews;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index() {
        $news = News::query()->paginate(9);
        return $this->returnView('pages.news.index', [
            'news' => $news
        ]);
    }

    public function show(News $news) {
        $similar_news = (new SimilarNews())->getSimilarModels($news);
        return $this->returnView('pages.news.show', [
            'news' => $news,
            'similar_news' => $similar_news,
        ]);
    }

    public function find(NewsFindRequest $request) {
        $request->flash();
        $request->validated();
        $search_value = '%' . $request->news_find . '%';
        $news = News::query()->where('title', 'like', $search_value)->paginate(9);
        return $this->returnView('pages.news.index', [
            'news' => $news,
        ]);
    }

    public function addNewsForFavorite(int $id) {
        $check_news = DB::table('user_favorites_news')->where('user_id', Auth::id())
            ->where('news_id', $id)->get();
        if ($check_news->isEmpty()) {
            DB::table('user_favorites_news')->insert([
                    'news_id' => $id,
                    'user_id' => Auth::id()
                ]);

            return back()->with('success', 'Новость добавлена в ваши избраные');
        }

        return back()->with('error', 'Эта новость уже есть в избраных');
    }

    public function favoritesUserNews() {
        $news = News::query()->join('user_favorites_news', 'news.id', '=', 'user_favorites_news.news_id')
            ->where('user_favorites_news.user_id', Auth::id())->select('news.*')->paginate(9);
        return $this->returnView('pages.news.index', [
            'news' => $news,
        ]);
    }
}
