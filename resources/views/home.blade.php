@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($products as $product)
            <div class="card m-1" style="width: 18rem;">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <a href="#" id="buy" class="btn btn-primary" data-id="{{ $product->id }}">Add to cart</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('a#buy').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var id = $(this).data('id');
                var url = "/addcart";

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {id: id },
                    dataType: 'json',
                    success: function(response){
                        //console.log(response);
                        //console.log(response.cart_qty);
                        $('.badge').html(response.cart_qty);
                    }});
                });
        });
    </script>
@endsection