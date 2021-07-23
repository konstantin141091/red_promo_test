@extends('layouts.main')

@section('content')
    <div class="content__top margin-bottom-30">
        <div class="content__top__img"> <img src="http://placehold.it/770x410" alt="poster">
            <div class="content__top__text">
                <span><a href="">title3</a></span>
                <h2><a href="">title3</a></h2> </div>
        </div>
    </div>
    <div class="content__bottom margin-bottom-30">
        <div class="row">

            <div class="col-lg-4">
                <div class="content__bottom__single">
                    <div class="content__bottom__single__img margin-bottom-30"> <img src="http://placehold.it/237x157" alt="poster"> </div>
                    <div class="content__bottom__text">
                        <span><a href="">title</a></span>
                        <h3><a href="">title2</a></h3> </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="content__bottom__single">
                    <div class="content__bottom__single__img margin-bottom-30"> <img src="http://placehold.it/237x157" alt="poster"> </div>
                    <div class="content__bottom__text">
                        <span><a href="">title</a></span>
                        <h3><a href="">title2</a></h3> </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="content__bottom__single">
                    <div class="content__bottom__single__img margin-bottom-30"> <img src="http://placehold.it/237x157" alt="poster"> </div>
                    <div class="content__bottom__text">
                        <span><a href="">title</a></span>
                        <h3><a href="">title2</a></h3> </div>
                </div>
            </div>



{{--            @forelse($news as $item)--}}
{{--                <div class="col-lg-4">--}}
{{--                    <div class="content__bottom__single">--}}
{{--                        <div class="content__bottom__single__img margin-bottom-30"> <img src="https://placehold.it/237x157" alt="poster"> </div>--}}
{{--                        <div class="content__bottom__text">--}}
{{--                            <span><a href="{{ route('category.show', $item->category_id) }}">{{ $item->cat_title }}</a></span>--}}
{{--                            <h3><a href="{{ route('news.show', $item->id) }}">{{ $item->title }}</a></h3> </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @empty--}}
{{--                <p>Новостей нет</p>--}}
{{--            @endforelse--}}

        </div>
    </div>

@endsection


