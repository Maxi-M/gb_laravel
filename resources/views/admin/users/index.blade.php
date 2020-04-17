@extends('layouts.app')

@section('title', 'Список пользователей')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Список всех пользователей
            </div>

            <div class="card-body">
                @if($users->count() > 0)
                    @foreach ($users as $user)
                        <div class="news-item">
                            {{ $user->name }}&nbsp;({{ $user->email }})

                            <div>
                                @if($user->id !== \Illuminate\Support\Facades\Auth::user()->id)
                                <form style="display: inline-block" method="POST"
                                      action="{{ route('admin.users.toggleAdmin', $user) }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="PATCH">
                                    <button class="btn
                                        @if($user->is_admin)btn-danger @else btn-success @endif" type="submit"
                                        @if($user->is_admin && $user->id === \Illuminate\Support\Facades\Auth::user()->id)
                                            disabled
                                        @endif>
                                        @if($user->is_admin)
                                            Сделать пользователем
                                        @else
                                            Сделать администратором
                                        @endif
                                    </button>
                                </form>
                                @else
                                Администратор
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    Что-то пошло не так, невозможно получить список пользователей.
                @endif
                <div class="news-pagination">{{ $users->links() }}</div>
            </div>
        </div>
    </div>
@endsection
