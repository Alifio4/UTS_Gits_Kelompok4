@extends('app')

@section('content')
    {{-- <div class="justify-content-center d-flex mt-4" style="width: 100%">
        <div class="card p-3">
            <form action="{{ url('product') }}" method="POST">
                @csrf
                <table style="width: 600px">
                    <tbody>
                        <tr>
                            <td><label for="exampleInputEmail1" class="flex-1 mb-1">Nama Produk</label></td>
                            <td><input type="text" class=@error('product_name') is-invalid @enderror"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" name="product_name"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div id="emailHelp" class="form-text">Nama produk tidak boleh lebih dari 255</div>
                                @error('product_name')
                                    <div class="invalid-feedback">
                                        Nama tidak boleh kosong
                                    </div>
                                @enderror
        </div>
        </td>
        </tr>
        <tr>
            <td><label for="exampleInputEmail1" class="flex-1 mb-1">Deskripsi</label></td>
            <td><input type="text" class=@error('product_description') is-invalid @enderror" id="exampleInputEmail1"
                    aria-describedby="emailHelp" name="product_description"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                @error('product_description')
                    <div class="invalid-feedback">
                        Description tidak boleh kosong
                    </div>
                @enderror
    </div>
    </td>
    </tr>
    <tr>
        <td><label for="exampleInputEmail1" class="flex-1 mb-1">Harga</label></td>
        <td><input type="text" class=@error('product_price') is-invalid @enderror" id="exampleInputEmail1"
                aria-describedby="emailHelp" name="product_price"></td>
    </tr>
    <tr>
        <td></td>
        <td>
            @error('product_price')
                <div class="invalid-feedback">
                    Harga tidak boleh kosong
                </div>
            @enderror
        </td>
    </tr>
    <tr>
        <td></td>
        <td><select class=mt-3 @error('category_id') is-invalid @enderror" aria-label="Default select example"
                name="category_id">
                <option selected>Pilih Kategori</option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                @endforeach
            </select>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            @error('category_id')
                <div class="invalid-feedback">
                    Pilih salah satu kategori
                </div>
            @enderror
        </td>
    </tr>
    </tbody>
    </table>
    <button type="submit" class="btn btn-primary mt-3">Ubah</button>
    </form>
    </div>
    </div> --}}
    <h1 class="text-center text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span
      class="bg-[#000000cc] dark:bg-[#000000cc] dark:text-white rounded-lg px-2">Tambah Produk</span></h1>

    <div class="m5">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2 mx-[10%] mt-[2%] bg-[#000000cc] dark:bg-[#000000cc]">
            <form action="{{ url('product') }}" method="POST">
                @csrf
                <table class="w-full text-sm text-left text-white dark:text-white mb-2">
                    <thead class="text-xs text-white uppercase dark:text-white">
                        <tr class="flex justify-between">
                            <th scope="col" class="px-6 py-3">
                                Nama Produk
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Deskripsi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kategori
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="bg-[#ffffff12] border-b dark:bg-[#ffffff12] dark:border-[#ffffff12] flex justify-between">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex flex-col">
                                <label for="product_name" class="flex-1 mb-1">Nama Produk</label>
                                <input type="text"
                                    class="flex-1 bg-[#0000003b] bg-[#0000003b] @error('product_name') is-invalid @enderror"
                                    id="product_name" name="product_name">
                                @error('product_name')
                                    <div class="invalid-feedback">
                                        Nama tidak boleh kosong
                                    </div>
                                @enderror
                            </td>
                            <td class="px-6 py-4 flex flex-col">
                                <label for="product_description" class="flex-1 mb-1">Deskripsi</label>
                                <input type="text"
                                    class="flex-1 bg-[#0000003b] @error('product_description') is-invalid @enderror"
                                    id="product_description" name="product_description">
                                @error('product_description')
                                    <div class="invalid-feedback">
                                        Deskripsi tidak boleh kosong
                                    </div>
                                @enderror
                            </td>
                            <td class="px-6 py-4 flex flex-col">
                                <label for="product_price" class="flex-1 mb-1">Harga</label>
                                <input type="text"
                                    class="flex-1 bg-[#0000003b] @error('product_price') is-invalid @enderror"
                                    id="product_price" name="product_price">
                                @error('product_price')
                                    <div class="invalid-feedback">
                                        Harga tidak boleh kosong
                                    </div>
                                @enderror
                            </td>
                            <td class="px-6 py-4 flex flex-col">
                                <label for="category_id" class="flex-1 mb-1">Kategori</label>
                                <select class="flex-1 bg-[#0000003b] @error('category_id') is-invalid @enderror"
                                    id="category_id" name="category_id">
                                    <option selected>Pilih Kategori</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="bg-[#0000003b]">
                                        Pilih salah satu kategori
                                    </div>
                                @enderror
                            </td>
                            <td class="mx-6 my-4 flex flex-col">
                                <button type="submit"
                                    class=" text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-[#000000cc] bg-[#000000cc] dark:hover:bg-black focus:outline-none dark:focus:ring-black">Tambah</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>

        </div>
    </div>
@endsection
