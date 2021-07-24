@extends('layouts.main')

@section('content')
    <div class="content__bottom margin-bottom-30">
        <div class="row">

            @forelse($news as $item)
                <div class="col-lg-4">
                    <div class="content__bottom__single">
                        <div class="content__bottom__single__img margin-bottom-30"> <img src="http://placehold.it/237x157" alt="poster"> </div>
                        <div class="content__bottom__text">
                            <span>{{ $item->description }}</span>
                            @if($item->favorites)
                                <span style="background-color: #ff939c">Избраное</span>
                            @endif
                            <h3><a href="{{ route('news.show', $item) }}">{{ $item->title }}</a></h3> </div>
                        @auth
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Добавить в мои избраные</button>
                        @endauth
                    </div>
                </div>
            @empty
                <p>Новостей нет</p>
            @endforelse

            <div class="container flex justify-content-center margin-top-30">
                {{ $news->links() }}
            </div>

        </div>
    </div>

@endsection


