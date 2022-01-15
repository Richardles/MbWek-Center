@extends('layouts.main')

@section('content')
    <div class="container">
        <div>
            <h4>Transaction</h4>
        </div>
        <table class="table table-striped mt-4">
            <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Transaction Time</th>
                <th scope="col">Detail Transaction</th>
            </tr>
            </thead>
            <tbody>
            @foreach($purchases as $purchase)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$purchase->created_at}}</td>
                <td>
                    <form method="POST" action="{{route('purchase-detail', $purchase->purchase_header_id)}}">
                        @csrf
                        @method('post')
                        <button type="submit" class="btn btn-primary">Check Detail</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
