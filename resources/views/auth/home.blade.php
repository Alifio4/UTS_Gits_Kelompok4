@extends('auth.layouts.app')

@section('title', 'Homepage')

@section('content')

<a href="{{ url('product/add') }}">
    <button class="btn btn-primary mt-4 mx-3" type="button">+ Tambah Produk</button>
</a>


<div class="row fs-5 text-center">
    @foreach ($products as $item)
    <div class="mt-3 col-4 p-4">
        <div class="card m-0">
            <div class="card-body">
                <div class="card-title">
                    {{ $item->name }} ( Rp {{ $item->price }} )
                </div>
                <h6 class="card-subtitle mb-2 text-muted">{{ $item->category->name }}</h6>
                <div class="class">{{ $item->description }}</div>
                <a href="product/{{ $item->id }}/edit">
                    <button class="btn btn-warning mt-3" type="button">Edit</button>
                </a>
                <a href="product/{{ $item->id }}/delete">
                    <button class="btn btn-danger mt-3" type="button">Hapus</button>
                </a>
                <a href="cart/{{ $item->id }}/store">
                    <button class="btn btn-warning mt-3" type="button">Tambahkan ke keranjang</button>
                </a>
          </div>
        </div>
    </div>
    @endforeach
</div>

<div class="container">
    <a href="{{ url('cart/checkout') }}">
        <button type="button" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
            </svg>
            Checkout
            <span class="badge light text-white bg-warning rounded-circle">{{ $cart }}</span>
          </button>
    </a>
  </div>

@endsection 