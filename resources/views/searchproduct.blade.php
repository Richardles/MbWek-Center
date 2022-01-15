@extends('layouts.main')

@section('container')
    <div class="container">
        <div>
            <form method="POST" action="{{ route('search-product') }}">
                @csrf

                <div class="form-group row">
                    <label for="search" class=" col-form-label text-md-right">{{ __('Search :') }}</label>

                    <div class="col-md-2">
                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" required
                            autofocus>
                            <option value="1">Animal</option>
                            <option value="2">Animal Product</option>
                            <option value="3">Fodder</option>
                        </select>

                        @error('search')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <input id="search" type="text" class="form-control @error('search') is-invalid @enderror"
                            name="search" autofocus>

                        @error('search')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary w-50">
                            Search
                        </button>
                    </div>
                </div>
            </form>
        </div>
        @if (sizeof($products) > 0)
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-sm-4 mt-2">
                        <div class="card" style="height: 100%">
                            <img class="card-img-top img" src="/asset/{{ $product->image }}" alt="Card image cap">
                            <div class="card-body" style="position:relative; display: flex; flex-direction: column">
                                <h5 class="card-title">{{ $product->title }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                @if (auth()->user() && auth()->user()->role_id == 1)
                                    <a href="/update-product/{{ $product->product_id }}" class="btn btn-danger mb-3"
                                        style="width: 100%; margin-top: auto;">Update Product</a>
                                @endif
                                <a href="/product-detail/{{ $product->product_id }}" class="btn btn-primary mt-auto"
                                    style="width: 100%; margin-top: auto;">product detail</a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4 d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        @else
            <div>
                Product is not found !
            </div>
        @endif
    </div>
@endsection
