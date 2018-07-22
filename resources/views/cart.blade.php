@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">Zboží</th>
                    <th scope="col">Cena</th>
                    <th scope="col">Množství</th>
                    <th scope="col">Cena celkem</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($cart as $row)
                <tr>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->price }}</td>
                    <td>{{ $row->qty }}</td>
                    <td>{{ $row->total }}</td>
                    <td> <a href="{{ URL::to('/cartdelete/'.$row->id ) }} " class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection