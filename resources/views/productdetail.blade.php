@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <img class="img" src="{{ asset('asset/'.$product->image) }}">
            </div>
            <div class="col-sm-7">
                <div class="mt-3">
                    <h3>{{$product->title}}</h3>
                </div>
                <div class="mt-3">
                    <h5>Description :</h5>
                </div>
                <div class="box mt-2">
                    {{$product->description}}
                </div>
                <div class="mt-3">
                    <h5>Stock :</h5>
                </div>
                <div>
                    {{$product->stock}} piece(s)
                </div>
                <div class="mt-3">
                    <h5>Price :</h5>
                </div>
                <div>
                    Rp. {{$product->price}} ,-
                </div>
                <div class="mt-5">
                    <form method="POST" action="{{route('store-cart')}}">
                        @csrf
                        <div>
                            <h4>Add To Cart</h4>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-2 ml-0 col-form-label text-md-right">{{ __('Quantity : ') }}</label>

                            <div class="col-md-10">
                                <input id="quantity" type="number" class="form-control w-100 @error('quantity') is-invalid @enderror" name="quantity" required autofocus>

                                @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" value="{{$product->stock}}" name="stock">
                        <input type="hidden" value="{{$product->item_id}}" name="item_id">

                        <div class="mt-3" style="text-align: center">
                                <button type="submit"class="btn btn-primary w-25">
                                    {{ __('Submit') }}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
