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
            <td><a href="{{ URL::to('/admin/category/edit/'.$category->id ) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Upravit</a></td>
            <td>
                <form action="{{ URL::to('/admin/category/destroy/'.$category->id) }}" method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete">
                    <div class="btn-group">
                        <button onclick="return confirm('Opravdu chcete smazat?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Smazat</button>
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection