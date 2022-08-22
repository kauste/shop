@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
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
                            <ths cope="col">
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
                            <b>{{$cloth->id}}</b>
                            <td class="controls">
                                <a href="{{route('cloth-edit', $cloth)}}" class="btn btn-outline-success">EDIT</a>
                                <form method="post" action="{{route('cloth-delete', $cloth)}}">
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