@extends('layouts.app')

@section('title', 'Список новостей')

@section('content')
<h1> Вот какие новости есть:</h1>

<?php if (isset($category_name)): ?>
<p>Категория: <strong><?= $category_name ?></strong></p>
<?php endif; ?>

<div class="news-list">
    <?php foreach ($news as $item): ?>
    <a href="<?= route('NewsOne', $item['id']) ?>"><?= $item['title'] ?></a><br>
    <?php endforeach; ?>
</div>

@endsection
