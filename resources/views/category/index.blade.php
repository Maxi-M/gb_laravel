@extends('layouts.app')

@section('title', 'Список категорий')

@section('content')
<h1> Вот какие категории есть:</h1>
<div class="category-list">
    <?php foreach ($categories as $item): ?>
    <a href="<?= route('NewsByCategory', $item['text']) ?>"><?= $item['text'] ?></a><br>
    <?php endforeach; ?>
</div>

@endsection
