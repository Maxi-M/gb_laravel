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
                        @foreach ($categories as $item)
                            <a href="{{ route('NewsByCategory', \Illuminate\Support\Str::slug($item['text'])) }}">{{ $item['text'] }}</a>
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
