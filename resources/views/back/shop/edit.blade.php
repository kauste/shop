@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-8 p-5">
            <div class="card-header">
                <h1>Create new shop</h1>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('shop-update', $shop)}}">
                    <div class="form-row align-items-center d-flex">
                        <div class="col-md-7">
                            <label for="inputAddress">Name</label>
                            <input required type="text" class="form-control" name="shop_name" value="{{$shop->name}}">
                        </div>
                        <div class="col-md-2">
                            <label for="inputAddress">Work start hour</label>
                            <input required type="time" class="form-control" name="work_starts" value="{{$shop->starts}}">
                        </div>
                        <div class="col-md-2">
                            <label for="inputAddress">Work end hour</label>
                            <input required type="time" class="form-control" name="work_ends" value="{{$shop->ends}}">
                        </div>
                    </div>
                    <div class="form-row align-items-center d-flex">
                        <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input required type="text" class="form-control" id="inputCity" name="city" value="{{$shop->city}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Address</label>
                            <input required type="text" class="form-control" id="inputAddress2" name="adress" value="{{$shop->adress}}">
                        </div>
                    </div>
                    <div class="form-row align-items-center d-flex">
                    @csrf
                    @method('put')
                        <button type="submit" class="btn btn-primary m-3">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection