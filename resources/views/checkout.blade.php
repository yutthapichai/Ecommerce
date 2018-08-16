@extends('layouts.app')

@section('content')
<div class="container">
  @include('errors.session')
</div>
<div class="container-fluid">
  <div class="row">
      <div class="col-lg-1">
      </div>
    <div class="col-lg-10">
      <h1 class="text-success text-center">Check out: {{ Cart::content()->count() }} item</h1>
      @if(Cart::content()->count() > 0)
      <div class="card">
        <div class="card-body">
          <table class="table text-center">
            <thead>
              <tr class="bg-secondary text-white">
                <th width="20%">Product</th>
                <th>Price</th>
                <th width="20%">Quatity</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach(Cart::content() as $pdt)
                  <td>
                    <img src="{{ asset($pdt->model->image) }}" alt="{{ asset($pdt->image) }}" width="100%">
                    <h5>{{ $pdt->name }}</h5>
                  </td>
                  <td>${{ $pdt->price }}</td>
                  <td>
                    x {{ $pdt->qty }}
                </td>
                <td>$ {{ $pdt->total() }}</td>
              </tr>
                @endforeach
                <tr>
                  <td></td>
                  <td></td>
                  <td>{{ cart::count() }}</td>
                  <td>{{ Cart::total() }}</td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><button class="btn btn-primary float-right mt-3" type="button" data-toggle="modal" data-target="#exampleModal">Pay with Card</button></td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
      @else
      <div class="text-center">
        <a href="{{ route('index') }}" class="btn btn-secondary">Back</a>      
      </div>
      @endif
    </div>
    <div class="col-lg-1">

    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pay with card</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('cart.checkout') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="custom-control custom-checkbox my-1 mr-sm-2">
            <input type="checkbox" class="custom-control-input" id="customControlInline">
            <label class="custom-control-label" for="customControlInline">Agree</label>
          </div>
          <button type="submit" class="btn btn-primary float-right">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
