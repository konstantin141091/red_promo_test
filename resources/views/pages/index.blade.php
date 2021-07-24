@extends('layouts.main')

@section('content')
    <div class="content__bottom margin-bottom-30">
        <div class="row">

            @forelse($news as $item)
                @include('components.news_tpl', ['news' => $item])
            @empty
                <p>Новостей нет</p>
            @endforelse

            <div class="container flex justify-content-center margin-top-30">
                {{ $news->links() }}
            </div>

        </div>
    </div>

@endsection


