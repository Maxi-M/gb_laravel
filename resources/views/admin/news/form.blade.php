@extends('layouts.app')

@section('title', 'Новая новость')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Добавить новость</div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="POST" action="
                            @if($news !== null)
                        {{ route('admin.news.update', $news) }}
                        @else
                        {{ route('admin.news.store') }}
                        @endif
                            ">
                            @csrf
                            @if ($news !== null)
                                <input type="hidden" name="_method" value="PATCH">
                            @endif
                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-2 col-form-label text-md-left">Заголовок</label>

                                <div class="col-md-10">
                                    <input id="title" type="text"
                                           class="form-control @error('title') is-invalid @enderror" name="title"
                                           value="{{ $news !== null ? $news->title : old('title') }}" autofocus>
                                    @component('components.validationError', ['field' => 'title'])@endcomponent
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_id"
                                       class="col-md-2 col-form-label text-md-left">Категория</label>

                                <div class="col-md-10">
                                    <select id="category_id"
                                            class="form-control @error('category_id') is-invalid @enderror"
                                            name="category_id">
                                        <option selected>- Выберите категорию -</option>
                                        @foreach($categories as $item)
                                            <option @if(($item->id === ($news !== null ? $news->category_id : null)) ||
                                                        ((int)old('category_id') === $item->id))
                                                    selected
                                                    @endif
                                                    value="{{ $item->id }}">{{ $item->text }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @component('components.validationError', ['field' => 'category_id'])@endcomponent
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-4 col-form-label text-md-left">Текст новости</div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea rows="10" id="text"
                                              class="form-control @error('text') is-invalid @enderror"
                                              name="text">{{ $news !==null ? $news->text : old('text') }}
                                    </textarea>
                                    @component('components.validationError', ['field' => 'text'])@endcomponent
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="image"
                                       class="col-md-12 col-form-label text-md-left">Картинка для новости</label>
                                <div class="col-md-12">
                                    <input class="form-control-file @error('image')is-invalid @enderror" type="file"
                                           name="image" id="image">
                                    @component('components.validationError', ['field' => 'image'])@endcomponent
                                </div>

                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary col-md-4 offset-md-4">
                                        @if ($news !== null)
                                            Сохранить новость
                                        @else
                                            Добавить новость
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
