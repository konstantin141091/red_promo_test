<div class="col-lg-4">
    <div class="content__bottom__single">
        <div class="content__bottom__single__img margin-bottom-30"> <img src="http://placehold.it/237x157" alt="poster"> </div>
        <div class="content__bottom__text">
            <span>{{ $news->description }}</span>
            @if($news->favorites)
                <span style="background-color: #ff939c">Избраное</span>
            @endif
            <h3><a href="{{ route('news.show', $news) }}">{{ $news->title }}</a></h3> </div>
        @auth
            @userFavorites($news->id)
            <form action="{{ route('news.favorites.add', $news->id) }}" method="POST" class="mb-3">
                @csrf
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Добавить в мои избраные</button>
            </form>
            @enduserFavorites
        @endauth
    </div>
</div>
