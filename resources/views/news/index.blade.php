@extends('layouts.app')

@section('title', 'Список новостей')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
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
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(count($news)>0)
                            @foreach ($news as $item)
                                <div class="news-card">
                                    <a class="news-link" href="{{ route('news.show', $item->id) }}">
                                        <div class="news-title">{{ $item->title }}</div>
                                    </a>
                                    <div class="news-image" style="background-image: url({{ $item->image ??
                                        asset('/storage/images/noImg.jpg') }}) ">

                                    </div>
                                </div>
                            @endforeach
                        @else
                            Новости не найдены
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
