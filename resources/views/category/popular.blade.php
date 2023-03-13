<?php

?>
@extends('layouts.main')
@section('content')
    <h1>Топ-5 популярных категорий</h1>
    <ul class="list-group">
        @foreach($categories as $category)
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">{{ $category->name }}</div>
                    Отзывов: {{ $category->count_review}}
                </div>
            </li>
        @endforeach
    </ul>
@endsection
