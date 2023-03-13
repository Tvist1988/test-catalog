<?php

?>
@extends('layouts.main')
@section('content')
    <div class="container">
        <h1>Оставить отзыв о товаре {{ $product->name }}</h1>
        <form method="post" action="{{ route('review.store') }}" enctype="multipart/form-data">
            @csrf
            <input name="product_id" type="hidden" value="{{ $product->id }}">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Введите отзыв</label>
                <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                @error('comment')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Приложите файлы (до 3 штук</label>
                <input class="form-control" name="files[]" type="file" id="formFileMultiple" multiple>
                @error('files.*')
                <div class="text-danger">{{$message}}</div>
                @enderror
                @error('files')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
            <button type="submit" class="btn btn-primary">Оставить отзыв</button>
            </div>
        </form>
    </div>

@endsection
