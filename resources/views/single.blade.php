@extends('layouts.app')

@section('content')
<div class="container-fluid">

  @include('errors.session')
  <div class="row">
      <div class="col-lg-1">
      </div>
    <div class="col-lg-4">
      <img src="{{ asset($product->image) }}" alt="" width="100%">
    </div>
    <div class="col-lg-6">
      <h4 class="text-success">$ {{ $product->price}}</h4>
      <h3>{{ $product->name }}</h3>
      <p class="text-muted">{{ $product->description }}</p>

<form class="" action="{{ route('cart.add') }}" method="post">
  {{ csrf_field() }}
<input type="hidden" name="pdt_id" value="{{ $product->id }}">
<div class="input-group mb-3" style="width:200px">
  <div class="input-group-prepend">
    <label class="input-group-text" for="qty">Amount</label>
  </div>
  <select class="custom-select" id="qty" name="amount">
    <option selected>Choose...</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select>
</div>

  <button class="btn btn-secondary float-right" type="submit">Add to card</button>
</form>
    </div>
    <div class="col-lg-1">
    </div>
  </div>
</div>
@endsection
