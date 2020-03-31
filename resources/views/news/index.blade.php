@extends('layouts.app')

@section('title', 'Список новостей')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @if(isset($category_name))
                            Новости категории <strong>{{ $category_name }}</strong>
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
                                <a href="{{ route('NewsOne', $item['id']) }}">{{ $item['title'] }}</a><br>
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
