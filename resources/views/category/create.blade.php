@extends('app')

@section('content')
<h1 class="text-center text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span
    class="bg-[#000000cc] dark:bg-[#000000cc] dark:text-white rounded-lg px-2">Tambah Kategori</span></h1>

    <div class="m-5">
        <div class="relative overflow-x-auto shadow-md rounded-lg p-2 mx-[10%] mt-[2%] bg-opacity-70 bg-black dark:bg-opacity-70 dark:bg-black">
            <form method="POST" action="{{ route('category.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-white font-bold mb-2">Nama Kategori</label>
                    <input type="text" class="form-input w-full bg-transparent border border-gray-300 rounded py-2 px-3 text-white leading-tight focus:outline-none focus:border-blue-500" id="name" name="name" required>
                </div>
                <button type="submit" class="bg-[#0000006e] hover:bg-[#000000cc] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
            </form>
        </div>
    </div>
    
@endsection
