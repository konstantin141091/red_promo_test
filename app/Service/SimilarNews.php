<?php


namespace App\Service;

use App\Models\News;
use App\Models\SimilarModel;
use Illuminate\Support\Collection;

class SimilarNews extends SimilarModel
{
    /**
     * Find similar news in database table news
     *
     * @param News $news
     *
     * @return Collection $similar_news
     *
     */
    public function getSimilarModels(News $news) {
        $search_value = '%' . $this->findRepeatWord($news->text) . '%';
        $similar_news = News::query()->where('text', 'like', $search_value)
            ->where('id', '!=', $news->id)->limit(3)->get();
        return $similar_news;
    }


}
