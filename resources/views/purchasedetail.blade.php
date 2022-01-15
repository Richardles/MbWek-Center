@extends('layouts.main')

@section('content')
    <div class="container">
        <h4>Cart</h4>
        <table class="table mt-4" style="border: 1px solid rgb(200, 200, 200)">
            <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Item Name</th>
                <th scope="col">Item Detail</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Sub Total</th>
            </tr>
            </thead>
            <tbody>
                @foreach($purchaseDetails as $purchaseDetail)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$purchaseDetail->title}}</td>
                    <td>{{$purchaseDetail->description}}</td>
                    <td>{{$purchaseDetail->price}}</td>
                    <td>{{$purchaseDetail->quantity}}</td>
                    <td>{{$purchaseDetail->price * $purchaseDetail->quantity}}</td>
                </tr>
            @endforeach
        </table>
        <div style="display: flex; flex-direction: row-reverse">
            <td>Grand Total :</td>
            <td>Rp.{{$total}},-</td>
        </div>
    </div>
@endsection
