@extends('layouts.app')

@section('title', 'Список новостей')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Список всех новостей
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if($news->count() > 0)
                            @foreach ($news as $item)
                                <div class="news-item">
                                    <a class="news-link" href="{{ route('news.show', $item->id) }}">
                                        {{ $item->title }}
                                    </a>
                                    <div class="news-controls">
                                        <a class="btn btn-success" href=" {{ route('admin.news.edit', $item) }}">Редактировать</a>
                                        <form style="display: inline-block" method="POST" action="{{ route('admin.news.destroy', $item) }}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger" type="submit">Удалить</button>
                                        </form>

                                    </div>
                                </div>
                            @endforeach
                        @else
                            Новости не найдены
                        @endif
                        <div class="news-pagination">{{ $news->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
