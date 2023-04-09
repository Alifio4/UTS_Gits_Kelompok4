@extends('auth.layouts.app')

@section('content')

  <div class="justify-content-center d-flex mt-3" style="width: 100%">
    <div class="card p-3">
      <form action="/product/{{ $product->id }}" method="POST">
        @method('PUT')
        @csrf
        <table style="width: 500px">
          <tbody>
            <tr>
              <td><label for="exampleInputEmail1" class="form-label">Nama Produk</label></td>
              <td><input type="text" class="form-control @error('product_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="product_name" value="{{ $product->name }}"></td>
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
              <td><label for="exampleInputEmail1" class="form-label">Deskripsi</label></td>
              <td><input type="text" class="form-control @error('product_description') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="product_description" value="{{ $product->description }}"></td>
            </tr>
            <tr>
              <td></td>
              <td>@error('product_description')
                  <div class="invalid-feedback">
                    Description tidak boleh kosong
                  </div>
                  @enderror
                </div>
              </td>
            </tr>
            <tr>
              <td><label for="exampleInputEmail1" class="form-label">Harga</label></td>
              <td><input type="text" class="form-control @error('product_price') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="product_price" value="{{ $product->price }}"></td>
            </tr>
            <tr>
              <td></td>
              <td>@error('product_price')
                  <div class="invalid-feedback">
                    Harga tidak boleh kosong
                  </div>
                  @enderror
              </td>
            </tr>
            <tr>
              <td></td>
              <td><select class="form-select mt-3 @error('category_id') is-invalid @enderror" aria-label="Default select example" name="category_id">
                  <option selected>Pilih Kategori</option>
                  @foreach ($categories as $category)
                      <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                      {{ $category->name }}
                      </option>
                  @endforeach
                </select>
              </td>
            </tr>
            <tr>
              <td></td>
              <td>@error('category_id')
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
    </div>
@endsection