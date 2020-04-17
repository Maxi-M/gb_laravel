@extends('layouts.app')

@section('title', 'Список категорий')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Категории новостей</div>

            <div class="card-body">
                @forelse ($categories as $item)
                    <a href="{{ route('news.byCategory', $item->slug) }}">{{ $item->text }}</a>
                    <br>
                @empty
                    <h1>Категории отсутствуют</h1>
                @endforelse
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
