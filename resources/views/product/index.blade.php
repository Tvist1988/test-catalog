<?php

?>
@extends('layouts.main')
@section('content')
    <div class="container">

    <div class="row">
        @foreach($products as $product)
            <div class="col-3 mb-2">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Категория {{$product->category->name}}</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <div class="row">
                    <div class="col-6">
                    <form method="post" action="/favorite" class="favorite">
                        @csrf
                    <input type="hidden" value="{{$product->id}}" name="id" class="product_id">
                    <button type="submit" class="btn btn-primary">В избранное</button>
                    </form>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('review.create', ['id' => $product->id]) }}" class="btn btn-secondary">Оставить отзыв</a>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        @endforeach
            </div>
                {{ $products->links() }}
    </div>

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="..." class="rounded me-2" alt="...">
                <strong class="me-auto toast-title">Успех</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Закрыть"></button>
            </div>
            <div class="toast-body">
                Вы успешно добавили товар в избранное
            </div>
        </div>
    </div>


@endsection



