<?php

?>
@extends('layouts.main')
@section('content')
    <div class="container">

    <div class="row">
        @foreach($reviews as $review)
            <div class="card text-center">
                <div class="card-header">
                    {{ $review->user->name }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">Отзыв на товар {{ $review->product->name }}</h5>
                    <p class="card-text">{{ $review->comment }}</p>
                    @isset($review->files)
                        <div class="row">
                        @foreach($review->files as $file)
                                <div class="col-4 text-center">
                                    <img class="img-thumbnail" src="{{asset(\Illuminate\Support\Facades\Storage::url($file->path))}}" alt="{{$file->name}}">
                                </div>
                            @endforeach
                        </div>
                    @endisset
                    <a href="{{ route('product.index') }}" class="btn btn-primary">Перейти к товарам</a>
                </div>
                <div class="card-footer text-muted">
                    {{ $review->created_at->diffForHumans() }}
                </div>
            </div>

    @endforeach
    {{ $reviews->links() }}

@endsection



