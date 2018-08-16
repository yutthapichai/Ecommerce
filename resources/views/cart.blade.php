@extends('layouts.app')

@section('content')
<div class="container-fluid">

  @include('errors.session')
  <div class="row">
      <div class="col-lg-1">
      </div>
    <div class="col-lg-10">
      <h1 class="text-success text-center">Your Shopping Cart: {{ Cart::content()->count() }} item</h1>
      <div class="card">
        <div class="card-body">
          <table class="table">
            <thead>
              <tr class="bg-secondary text-white">
                <th width="10%"></th>
                <th width="20%">Product</th>
                <th>Price</th>
                <th width="20%">Quatity</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach(Cart::content() as $pdt)
                  <td class="text-center">
                    <a href="{{ route('cart.delete', ['id' => $pdt->rowId]) }}" class="btn btn-danger">Delete</a>
                  </td>
                  <td>
                    <img src="{{ asset($pdt->model->image) }}" alt="{{ asset($pdt->image) }}" width="100%">
                    <h5>{{ $pdt->name }}</h5>
                  </td>
                  <td>${{ $pdt->price }}</td>
                  <td>
                    <div class="input-group mb-3" style="width:110px;">
                      <div class="input-group-prepend">
                        <a href="{{ route('cart.reduce', ['id' => $pdt->rowId, 'qty' => $pdt->qty]) }}" class="btn btn-outline-secondary">-</a>
                      </div>
                      <input type="text" value="{{ $pdt->qty }}" class="form-control">
                      <div class="input-group-append">
                        <a href="{{ route('cart.recrement', ['id' => $pdt->rowId, 'qty' => $pdt->qty]) }}" class="btn btn-outline-secondary">+</a>
                      </div>
                    </div>
                </td>
                <td>$ {{ $pdt->total() }}</td>
              </tr>
                @endforeach
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    {{ Cart::count() }}
                  </td>
                  <td>${{ Cart::total() }}</td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><a href="{{ route('cart.checkout') }}" class="btn btn-primary float-right mt-3">Check out</a></td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-lg-1">

    </div>
</div>
@endsection
