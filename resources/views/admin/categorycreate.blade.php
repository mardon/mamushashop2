@extends('layouts.dashboard')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ url('admin/category/store/') }}" method="POST" >
        @csrf
        <div class="form-group">
            <label for="name">Název kategorie</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="name">Slug</label>
            <input type="text" class="form-control" name="slug">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection