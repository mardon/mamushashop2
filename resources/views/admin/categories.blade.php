@extends('layouts.dashboard')

@section('content')
    <a href="{{ URL::to('/admin/category/create/') }}" class="btn btn-success">Přidat kategorii</a>
    <h2>Kategorie</h2>
    <table class="table table-sm">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Název</th>
            <th scope="col">Slug</th>
            <th scope="col">Počet produktů</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
        <tr>
            <<td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>{{ $category->products->count() }}</td>
            <td><a href="{{ URL::to('/admin/category/edit/'.$category->id ) }}" class="badge badge-primary">edit</a> <span class="badge badge-danger">delete</span></td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection