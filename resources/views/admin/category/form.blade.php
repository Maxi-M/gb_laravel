@extends('layouts.app')

@if ($category->id)
    @section('title', 'Редактирование Категории')
@else
    @section('title', 'Добавление категории')
@endif

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                @if ($category->id)
                    Редактировать категорию <strong>{{$category->text}}</strong>
                @else
                    Добавить новую категорию
                @endif
            </div>
            <div class="card-body">
                <form method="POST" action="
                            @if($category->id)
                {{ route('admin.category.update', $category) }}
                @else
                {{ route('admin.category.store') }}
                @endif
                    ">
                    @csrf
                    @if ($category->id)
                        <input type="hidden" name="_method" value="PATCH">
                    @endif
                    <div class="form-group row">
                        <label for="text"
                               class="col-md-2 col-form-label text-md-left">Название категории</label>

                        <div class="col-md-10">
                            <input id="text" type="text"
                                   class="form-control @error('text') is-invalid @enderror" name="text"
                                   value="{{ old('text') ?? $category->text }}" autofocus>
                            @component('components.validationError', ['field' => 'text'])@endcomponent
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="slug"
                               class="col-md-2 col-form-label text-md-left">Название категории транслитом</label>

                        <div class="col-md-10">
                            <input id="slug" type="text"
                                   class="form-control @error('slug') is-invalid @enderror" name="slug"
                                   value="{{ old('slug') ?? $category->slug }}">
                            @component('components.validationError', ['field' => 'slug'])@endcomponent
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary col-md-4 offset-md-4">
                                @if ($category->id)
                                    Сохранить категорию
                                @else
                                    Добавить категорию
                                @endif
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
