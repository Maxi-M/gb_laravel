@extends('layouts.app')

@section('title', 'Список новостей')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                @if(isset($category))
                    Новости категории <strong>{{ $category->text }}</strong>
                @else
                    Список всех новостей
                @endif
            </div>

            <div class="card-body">
                @if($news)
                    @foreach ($news as $item)
                        <div class="news-card">
                            <a class="news-link" href="{{ route('news.show', $item->id) }}">
                                <div class="news-title">{{ $item->title }}
                                    {{ (new \Illuminate\Support\Carbon($item->posted_at))->toFormattedDateString() }}</div>

                            </a>
                            <div class="news-image" style="background-image: url({{ $item->image ??
                                        asset('/storage/images/noImg.jpg') }}) ">

                            </div>
                        </div>
                    @endforeach
                    @if($news->links())
                        <div class="news-pagination">{{ $news->links() }}</div>
                    @endif
                @else
                    Новости не найдены
                @endif
            </div>
        </div>
    </div>
@endsection
