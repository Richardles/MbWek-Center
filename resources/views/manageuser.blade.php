@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row"  style="border: 1px solid rgb(170, 170, 170);">
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-2">
                        <h5 class="p-2 pb-0 mb-0">User ID</h5>
                    </div>
                    <div class="col-sm-10">
                        <h5 class="pt-2 mb-0">Username</h5>
                    </div>
                </div>
            </div>
        </div>
        @foreach($users as $user)
        <div class="row pt-3 pb-3" style="border: 1px solid rgb(190, 190, 190); border-top: none; background-color: rgb(230, 230, 230)">
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-2">
                        <h5 class="pl-2">{{$user->user_id}}</h5>
                    </div>
                    <div class="col-sm-10">
                        <h5>{{$user->username}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <form method="POST" action="{{route('delete-user', $user->user_id)}}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
@endsection
