@extends('layouts.app')

@section('title', 'Список категорий')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Категории новостей</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
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
        </div>
    </div>
@endsection
