@extends('layouts.app')

@section('title', $news['title'])

@section('content')
    <h2><?=$news['title']?></h2>
    <p><?=$news['text']?></p>
@endsection
