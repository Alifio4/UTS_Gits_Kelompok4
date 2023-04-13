@extends('auth.layouts.app')

@section('title', 'Homepage')

@section('content')
    <a href="/product">
        <button class="btn btn-primary mt-4 mx-4 my-3" type="button">Tambah Produk ke Keranjang</button>
    </a>
    <div class="row fs-5 text-center">
        @foreach ($carts as $item)
            <div class="mt-3 col-4 p-4">
                <div class="card m-0">
                    <div class="card-body">
                        <div class="card-title">
                            {{ $item->cart->name }}

                            <br>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $item->cart->category->name }}</h6>
                            <br>
                            <div class="container">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="row">
                                            <div class="col">
                                                <a href="{{ url('cart/' . $item->product_id . '/subtract') }}">
                                                    <button class="btn btn-warning mt-3" type="button">-</button>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <div class="card" style="width: 5rem;">
                                                    <div class="card-body">
                                                        {{ $item->qty }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <a href="{{ url('cart/' . $item->product_id . '/add') }}">
                                                    <button class="btn btn-warning mt-3" type="button">+</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <a href="{{ url('cart/' . $item->product_id . '/destroy') }}">
                                            <button class="btn btn-danger mt-3" type="button">Hapus</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <h6 class="card-subtitle mb-2 text-muted">Total: Rp{{ $item->qty * $item->cart->price }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="container">
        <div class="card" style="width: 50rem;">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                            <div class="col-8">
                                @php
                                    $total = 0;
                                    foreach ($carts as $item) {
                                        $total = $total + $item->qty * $item->cart->price;
                                    }
                                @endphp
                                <h2 class="card-subtitle mb-2 text-muted">Total: Rp{{ $total }}</h2>
                            </div>
                            <div class="col-2">
                                    <button type="button" class="btn btn-primary" onclick="openPopup()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                            <path
                                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                                            </path>
                                        </svg>
                                        Checkout
                                    </button>
                                {{-- <form action="{{ route('cart.pay') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-primary mt-4 mx-3" type="submit">Lunas</button>
                                </form> --}}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup" id="popup">
        <h2>Transaksi</h2>
        <p>Apakah anda ingin membayar sekarang?</p>
        <form action="{{ route('cart.pay') }}" method="POST">
            @csrf
            <button class="btn btn-primary mt-4 mx-3" type="submit" onclick="closePopup()">OK</button>
        </form>
    </div>

    <script>
        let popup = document.getElementById("popup");
        function openPopup(){
            popup.classList.add("open-popup");
        }
        function closePopup(){
            popup.classList.remove("open-popup");
        }
    </script>
@endsection
