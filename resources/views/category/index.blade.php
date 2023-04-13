<!-- resources/views/produk/index.blade.php -->
@extends('app')

@section('content')
<h1 class="text-center text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span
    class="bg-[#000000cc] dark:bg-[#000000cc] dark:text-white rounded-lg px-2">Daftar Kategori</span></h1>

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
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3">Nama Kategori</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $order = 1;
                    @endphp
                    @foreach ($categorys as $kategori)
                    <tr class="bg-[#ffffff12] border-b dark:bg-[#ffffff12] dark:border-[#ffffff12]">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $order }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $kategori->name }}
                        </th>
                            <td class="px-6 py-2">
                                <div class="flex">
                                <a href="{{ route('category.edit', $kategori->id) }}"
                                    class="font-medium text-blue-600 dark:text-[#0063ff] hover:underline">Edit</a>
                                <a>&nbsp;|&nbsp;</a>
                                    <form action="{{ route('category.destroy', $kategori->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="font-medium text-blue-600 dark:text-[#ff0000] hover:underline"">Hapus</button>
                                </form>
                            </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            <div class="flex justify-between items-start mx-[10%] mt-[1%]">
                <a href="{{ route('category.create') }}"
                    class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-[#000000cc] bg-[#000000cc] dark:hover:bg-black focus:outline-none dark:focus:ring-black">Tambah
                    Kategori</a>
            </div>
    </div>
@endsection
