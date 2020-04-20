@extends('layouts.app')

@section('title', 'Редактирование профиля')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Редактирование профиля</div>
            <div class="card-body">
                <form method="POST" action="{{route('profile.update')}}">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group row">
                        <label for="name"
                               class="col-md-2 col-form-label text-md-left">Имя</label>

                        <div class="col-md-10">
                            <input id="name" type="text"
                                   class="form-control @error('name') is-invalid @enderror" name="name"
                                   value="{{ old('name') ?? $user->name  }}" autofocus>
                            @component('components.validationError', ['field' => 'name'])@endcomponent
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="old_password"
                               class="col-md-2 col-form-label text-md-left">Старый пароль</label>
                        <div class="col-md-10">
                            <input id="old_password" type="password"
                                   class="form-control @error('old_password') is-invalid @enderror" name="old_password"
                                   value="">
                            @component('components.validationError', ['field' => 'old_password'])@endcomponent
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password"
                               class="col-md-2 col-form-label text-md-left">Новый пароль</label>
                        <div class="col-md-10">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password"
                                   value="">
                            @component('components.validationError', ['field' => 'password'])@endcomponent
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm"
                               class="col-md-2 col-form-label text-md-left">Пароль повторно</label>
                        <div class="col-md-10">
                            <input id="password-confirm" type="password"
                                   class="form-control" name="password_confirmation"
                                   value="">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary col-md-4 offset-md-4">
                                Обновить данные
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
