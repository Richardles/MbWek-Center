@extends('layouts.main')

@section('container')
    <div class="container">
        <h4>Cart</h4>
        @if(count($carts) > 0)
        <table class="table mt-4" style="border: 1px solid rgb(200, 200, 200)">
            <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Item Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Sub Total</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($carts as $cart)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$cart->title}}</td>
                <td>{{$cart->price}}</td>
                <td>{{$cart->quantity}}</td>
                <td>{{$cart->price * $cart->quantity}}</td>
                <td>
                    <form method="POST" action="{{route('remove-cart', $cart->cart_id)}}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <div style="display: flex; flex-direction: row-reverse">
            <td>Grand Total :</td>
            <td>Rp.{{$total}},-</td>
        </div>
        <div class="mt-3" style="display: flex; flex-direction: row-reverse">
            <form method="POST" action="{{route('purchase')}}">
                @csrf
                <button type="submit" class="btn btn btn-primary">Checkout</button>
            </form>
        </div>
        @else
        <div class="mt-3">
            <h5>There's no item(s)</h5>
        </div>
        @endif
    </div>
@endsection
