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
          </div>
        </div>
    </div>
    @endforeach
</div>

@endsection 