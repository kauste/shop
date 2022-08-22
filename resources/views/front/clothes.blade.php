@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    @include('box')
        <div class="card">
            <div class="card-header">
                <h1>Our clothes</h1>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Cloth</th>
                            <th scope="col">Shop</th>
                            <th scope="col">Price</th>
                            <th scope="col">Amount left</th>
                            <th cope="col">
                                </th>
                                <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($clothes as $cloth)
                        <tr>
                            <th scope="row">{{$cloth->cloth_name}}</th>
                            <td>{{$cloth->name}}</td>
                            <td ><span @if($cloth->discount)style="text-decoration: line-through red;"@endif>{{$cloth->price}}</span> @if($cloth->discount){{$cloth->price - $cloth->discount}}</td>
                            @endif
                            <td>{{$cloth->amount_left}}</td>
                            <td class="controls">
                                <form method="post" action="#">
                                    @csrf
                                    @method('post')
                                    <button class="btn btn-outline-danger" type="submit">Order</button>
                                </form>
                            </td>
                            <td>
                            @include('rating')
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection