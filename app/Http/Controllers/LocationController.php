<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function show(Request $request) {
        $news = News::query()->where('location_id', $request->location)->orWhereNull('location_id')
            ->paginate(9);
        return $this->returnView('pages.news.index', [
            'news' => $news
        ]);
    }
}
