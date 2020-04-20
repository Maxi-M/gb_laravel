@extends('layouts.app')

@section('title', 'Список категорий')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Список всех категорий
            </div>
            <div class="card-body">
                @if($categories->count() > 0)
                    @foreach ($categories as $item)
                        <div class="news-item">
                            {{ $item->text }}
                            <div class="news-controls">
                                <a class="btn btn-success" href=" {{ route('admin.category.edit', $item) }}">Редактировать</a>
                                <form style="display: inline-block" method="POST"
                                      action="{{ route('admin.category.destroy', $item) }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger" type="submit">Удалить</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    Категории не найдены
                @endif
                <div class="news-pagination">{{ $categories->links() }}</div>
            </div>
        </div>
    </div>
@endsection
