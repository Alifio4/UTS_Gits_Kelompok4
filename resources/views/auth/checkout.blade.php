@extends('auth.layouts.app')

@section('title', 'Homepage')

@section('content')
<a href="/">
    <button class="btn btn-primary mt-4 mx-3" type="button">+ Tambah Produk</button>
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
                                    <a href="{{ url('cart/'.$item->product_id.'/subtract') }}">
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
                                    <a href="{{ url('cart/'.$item->product_id.'/add') }}">
                                        <button class="btn btn-warning mt-3" type="button">+</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <a href="{{ url('cart/'.$item->product_id.'/destroy') }}">
                                <button class="btn btn-danger mt-3" type="button">Hapus</button>
                            </a>
                        </div>
                    </div>
                  </div>
                
                
                <br>
                <br>
                
                </div>
                
                
                
          </div>
        </div>
    </div>
    @endforeach
</div>

@endsection 