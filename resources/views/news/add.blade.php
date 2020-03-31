@extends('layouts.app')

@section('title', 'Новая новость')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Добавить новость</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('NewsStore') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-2 col-form-label text-md-left">{{ __('Title') }}</label>

                                <div class="col-md-10">
                                    <input id="title" type="text"
                                           class="form-control @error('title') is-invalid @enderror" name="title"
                                           value="{{ old('title') }}" required autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_id"
                                       class="col-md-2 col-form-label text-md-left">{{ __('Category') }}</label>

                                <div class="col-md-10">
                                    <select id="category_id" class="form-control @error('category_id') is-invalid @enderror"
                                            name="category_id" required>
                                        <option selected>- Выберите категорию -</option>
                                        @foreach(\App\Models\News\Category::getCategories() as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['text'] }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-4 col-form-label text-md-left">{{ __('Text') }}</div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea rows="10" id="text"
                                              class="form-control @error('text') is-invalid @enderror"
                                              name="text">{{ old('text') }}</textarea>
                                    @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary col-md-4 offset-md-4">
                                        {{ __('Save') }}
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
