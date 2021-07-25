@extends('layouts.main')

@section('content')

    <div class="news margin-bottom-30">
        <div class="news__img"> <img src="http://placehold.it/770x410" alt="poster">

        </div>

        @if($news->favorites)
            <div>
                <span style="background-color: #ff939c">Избраная</span>
            </div>
        @endif

        <div class="news__title margin-bottom-30 margin-top-30">
            <h3>{{ $news->title }}</h3>
        </div>

        <div>
            <h4>{{ $news->description }}</h4>
        </div>

        <div class="news__text">
            <p align="justify">{{ $news->text }}</p>
        </div>

        <div class="mb-3">
            @auth
                @userFavorites($news->id)
                <form action="{{ route('news.favorites.add', $news->id) }}" method="POST" class="mb-3">
                    @csrf
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Добавить в мои избраные</button>
                </form>
                @enduserFavorites
            @endauth
        </div>

        <div class="news__links flex">
            <h3 class="margin-right-20">Share:</h3>
            <ul class="flex ul margin-0 padding-0">
                <li><a href="#"><img src="{{ asset('img/icon-ins.png') }}" alt="social"></a></li>
                <li><a href="#"><img src="{{ asset('img/icon-fb.png') }}" alt="social"></a></li>
                <li><a href="#"><img src="{{ asset('img/icon-tw.png') }}" alt="social"></a></li>
                <li><a href="#"><img src="{{ asset('img/icon-yo.png') }}" alt="social"></a></li>
            </ul>
        </div>
    </div>

    <div class="content__bottom margin-bottom-30">
        <h3>Похожие новости</h3>
        <div class="row">

            @forelse($similar_news as $item)
                @include('components.news_tpl', ['news' => $item])
            @empty
                <p>Похожих новостей нет</p>
            @endforelse

        </div>
    </div>

@endsection
