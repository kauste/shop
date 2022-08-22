@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-8 p-5">
            <div class="card-header">
                <h1>Edit cloth</h1>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('cloth-update', $cloth)}}">
                    <div class="form-row align-items-center d-flex">
                        <div class="col-md-7">
                            <label for="name">Name</label>
                            <input required type="text" class="form-control" name="cloth_name" value="{{$cloth->cloth_name}}">
                        </div>
                        <div class="col-md-5">
                            <label for="shop"></label>
                            <select id="shop" class="form-control" name="shop" value="{{$cloth->shop_id}}">
                                @foreach($shops as $shop)
                                <option value="{{$shop->id}}">{{$shop->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row align-items-center d-flex">
                        <div class="col-md-3">
                            <label for="amount_left">Amount left</label>
                            <input required type="text" class="form-control" name="amount_left" value="{{$cloth->amount_left}}">
                        </div>
                        <div class="col-md-3">
                            <label for="price">Price</label>
                            <div class="d-flex align-items-center ml-1">
                                <input required amount="price" type="number" id="price" class="form-control" name="price" value="{{$cloth->price}}"><span>eu.</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="name">Discount</label>
                            <input type="text" class="form-control" name="discount" value="{{$cloth->discount ?? 0}}">
                        </div>
                    </div>
                    @csrf
                    @method('put')
                    <div class="form-row align-items-center d-flex">
                        <button type="submit" class="btn btn-primary m-3">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
