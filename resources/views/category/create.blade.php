@extends('app')

@section('content')
<div class="container">
    <h1>Tambah Kategori Baru</h1>

    <form method="POST" action="{{ route('category.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Nama Kategori</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
