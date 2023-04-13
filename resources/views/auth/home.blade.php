@extends('app')

@section('title', 'Homepage')

@section('content')

    {{-- <a href="{{ url('product/add') }}">
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
    </div> --}}

    {{-- <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif --}}

        {{-- <a href="{{ url('cart/checkout') }}">
            <button type="button" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart"
                    viewBox="0 0 16 16">
                    <path
                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                    </path>
                </svg>
                Keranjang
                <span class="badge light text-white bg-warning rounded-circle">{{ $cart }}</span>
            </button>
        </a> --}}
    {{-- </div> --}}

    <h1 class="text-center text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span
            class="bg-[#000000cc] dark:bg-[#000000cc] dark:text-white rounded-lg px-2">Daftar Produk</span></h1>

    @if (session('success'))
        <div class="flex p-4 mx-[10%] mt-[2%] mb-[-1%] text-sm text-blue-800 border border-blue-300 rounded-lg bg-[#000000cc] dark:bg-[#000000cc] dark:text-blue-400 dark:border-blue-800"
            role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Info!</span> {{ session('success') }}
            </div>
        </div>
    @endif
    <div class="m5">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2 mx-[10%] mt-[2%] bg-[#000000cc] dark:bg-[#000000cc]">
            <table class="w-full text-sm text-left text-white dark:text-white mb-2">
                <thead class="text-xs text-white uppercase dark:text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kategori
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Deskripsi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga
                        </th>
                        @if (Auth::check())
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr class="bg-[#ffffff12] border-b dark:bg-[#ffffff12] dark:border-[#ffffff12]">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->category->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->description }}
                            </td>
                            <td class="px-6 py-4">
                                Rp{{ $item->price }}
                            </td>
                            @if (Auth::check())                                
                            <td class="px-6 py-4">
                                @php
                                    // Filter carts by product_id
                                    $itemCarts = $carts->where('product_id', $item->id);
                                @endphp
                                @if ($itemCarts->isEmpty())
                                    <a href="cart/{{ $item->id }}/store"
                                        class="font-medium text-blue-600 dark:text-[#01de01] hover:underline">Add</a>
                                @else
                                    @foreach ($itemCarts as $cart)
                                        <a href="cart/{{ $item->id }}/store"
                                            class="font-medium text-blue-600 dark:text-[#01de01] hover:underline">Add~({{ $cart->qty }})</a>
                                    @endforeach
                                @endif
                                <a> | </a>
                                <a href="product/{{ $item->id }}/edit"
                                    class="font-medium text-blue-600 dark:text-[#0063ff] hover:underline">Edit</a>
                                <a>|</a>
                                <a href="product/{{ $item->id }}/delete"
                                    class="font-medium text-blue-600 dark:text-[#ff0000] hover:underline">Hapus</a>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex justify-between items-start mx-[10%] mt-[1%]">
            <a href="product/add"
                class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-[#000000cc] bg-[#000000cc] dark:hover:bg-black focus:outline-none dark:focus:ring-black">Tambah
                Produk</a>
            <a href="{{ url('cart/checkout') }}"
                class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-[#000000cc] bg-[#000000cc] dark:hover:bg-black focus:outline-none dark:focus:ring-black flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart"
                    viewBox="0 0 16 16">
                    <path
                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                    </path>
                </svg>
                &nbsp;Keranjang
            </a>
        </div>
    </div>


@endsection
