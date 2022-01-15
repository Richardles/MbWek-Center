@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Product') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('update-product-data', $item->item_id) }}" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category : ') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" required autofocus>
                                        <option value="1">Animal</option>
                                        <option value="2">Product</option>
                                        <option value="3">Fodder</option>
                                    </select>

                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title : ') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$item->title}}" required autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description : ') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" required style="height: 10rem; resize: none">{{$item->description}}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price : ') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="number" class="form-control @error('price') is-invalid @enderror" value="{{$item->price}}" name="price" required autofocus>

                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="stock" class="col-md-4 col-form-label text-md-right">{{ __('Stock : ') }}</label>

                                <div class="col-md-6">
                                    <input id="stock" type="number" class="form-control @error('stock') is-invalid @enderror" value="{{$item->stock}}" name="stock" required autofocus>

                                    @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image : ') }}</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class=" @error('image') is-invalid @enderror" name="image" required autofocus>

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit"class="btn btn-primary w-50">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
