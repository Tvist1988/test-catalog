<?php

?>
@extends('layouts.main')
@section('content')
    <p>Вы искали {{$search}}. Найдено {{ $result->total()}}</p>
    <ul class="list-group">
        @foreach($result as $element)
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">{{ $element->name }}</div>
                {{ $element->category_id ? 'Продукт' : 'Категория' }}
            </div>
        </li>
        @endforeach
    </ul>
    {{ $result->links() }}
@endsection
