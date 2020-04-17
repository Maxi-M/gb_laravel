@extends('layouts.app')

@section('title', $news->title)

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                {{ $news->title }}
            </div>

            <div class="card-body">
                {{ $news->text }}
            </div>
        </div>
    </div>
@endsection
