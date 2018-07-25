@extends('layouts.dashboard')

@section('content')
    <h2>Kategorie</h2>
    <table class="table table-sm">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Název</th>
            <th scope="col">Slug</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
        <tr>
            <<td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td><a href="" class="badge badge-primary">edit</a> <span class="badge badge-danger">delete</span></td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection