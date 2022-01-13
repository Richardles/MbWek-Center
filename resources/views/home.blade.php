@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-sm-4 mt-2">
                    <div class="card" style="height: 100%">
                        <img class="card-img-top img" src="/asset/{{ $product->image }}" alt="Card image cap">
                        <div class="card-body" style="position:relative; display: flex; flex-direction: column">
                            <h5 class="card-title">{{$product->title}}</h5>
                            <p class="card-text">{{$product->description}}</p>
                            @if(auth()->user() &&auth()->user()->role_id == 1)
                            <a href="/update-product/{{$product->product_id}}" class="btn btn-danger mb-3" style="width: 100%; margin-top: auto;">Update Product</a>
                            @endif
                            <a href="/product-detail/{{$product->product_id}}" class="btn btn-primary mt-auto" style="width: 100%; margin-top: auto;">product detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
