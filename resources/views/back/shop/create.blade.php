@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-8 p-5">
            <div class="card-header">
                <h1>Create new cloth</h1>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('shop-store')}}">
                    <div class="form-row align-items-center d-flex">
                        <div class="col-md-7">
                            <label for="inputAddress">Name</label>
                            <input required type="text" class="form-control" name="shop_name">
                        </div>
                        <div class="col-md-2">
                            <label for="inputAddress">Shop</label>
                            <input required type="time" class="form-control" name="work_starts">
                        </div>
                        <div class="col-md-2">
                            <label for="inputAddress">Work end hour</label>
                            <input required type="time" class="form-control" name="work_ends">
                        </div>
                    </div>
                    <div class="form-row align-items-center d-flex">
                        <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input required type="text" class="form-control" id="inputCity" name="city">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Address</label>
                            <input required type="text" class="form-control" id="inputAddress2" name="adress">
                        </div>
                    </div>
                    <div class="form-row align-items-center d-flex">
                    @csrf
                    @method('post')
                        <button type="submit" class="btn btn-primary m-3">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection