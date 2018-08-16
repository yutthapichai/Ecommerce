@extends('layouts.app')

@section('content')
<div class="container">
  @include('errors.session')
    <div class="row">
      @foreach($products as $product)
        <div class="col-md-3 my-1">
          <div class="card">
            <img class="card-img-top" src="{{ asset($product->image ) }}" alt="Card image cap">
            <div class="card-body bg-info text-dark">
              <h5 class="card-title">{{ $product->name }}</h5>
              <p class="card-text">{{ str_limit($product->description, 100) }}</p>
              <h6>$ {{ $product->price }}</h6>
              <a href="{{ route('product.single', ['id' => $product->id]) }}" class="card-link text-light">Detail more..</a>
              <a href="{{ route('cart.rapid.add', ['id' => $product->id ]) }}" class="btn btn-primary float-right">Add to card</a>
            </div>
          </div>
        </div>
        @endforeach
    </div>
    <div class="mt-3">
      {{ $products->links() }}
    </div>
</div>
@endsection
