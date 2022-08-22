@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <h1>Our shops</h1>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Shop name</th>
                            <th scope="col">City</th>
                            <th scope="col">Adress</th>
                            <th scope="col">Working Hours</th>
                            <ths cope="col">
                                </th>
                                <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($shops as $shop)
                        <tr>
                            <th scope="row">{{$shop->name}}</th>
                            <td>{{$shop->city}}</td>
                            <td>{{$shop->adress}}</td>
                            <td>From {{substr($shop->starts, 0, -3)}}h to {{substr($shop->ends, 0, -3)}}h</td>
                            <td class="controls">
                                <a href="{{route('shop-edit', $shop)}}" class="btn btn-outline-success">EDIT</a>
                                <form method="post" action="{{route('shop-delete', $shop)}}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger" type="submit">DELETE</button>
                                </form>
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