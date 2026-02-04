@extends('layouts.index')

@section('content')
    <div class="flex flex-col items-center justify-center w-full p-20 h-auto" id="book-section">
        <div class="flex flex-col items-center justify-center w-full p-20 h-auto mb-16">
            <h1 class="text-4xl font-bold text-[#265949]">Cari <span class="text-[#eb7d4d]">Buku </span>Yang Kamu Mau</h1>
            <form action="" method="GET" class="flex items-center w-full max-w-3xl bg-white rounded-full shadow-soft-green overflow-hidden my-10">

                <input type="text" name="search" value="{{ request('search') }}" placeholder="Judul buku, penulis, atau kata kunci..." class="w-full px-6 py-4 border-none text-[#265949] focus:outline-none focus:ring-2 focus:ring-[#eb7d4d] placeholder:text-gray-400">

                <button
                    type="submit"
                    class="px-8 py-4 bg-[#eb7d4d] text-white font-bold
                        hover:bg-[#e46f3e] transition duration-300">
                    Cari
                </button>
            </form>
            <div class="flex flex-wrap items-center justify-center gap-4 w-full max-w-4xl">
                <select name="kategori"
                        class="w-1/4 px-5 py-3 rounded-full border border-[#265949]/20
                            text-[#265949] focus:outline-none
                            focus:ring-2 focus:ring-[#eb7d4d]">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('kategori') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <select name="sort"
                        class="w-1/4 px-5 py-3 rounded-full border border-[#265949]/20
                            text-[#265949] focus:outline-none
                            focus:ring-2 focus:ring-[#eb7d4d]">
                    <option value="">Urutkan</option>
                    <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                    <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Rating Tertinggi</option>
                    <option value="populer" {{ request('sort') == 'populer' ? 'selected' : '' }}>Paling Dipinjam</option>
                </select>
                <select name="status"
                        class="w-1/4 px-5 pr-10 py-3 rounded-full border border-[#265949]/20
                            text-[#265949] focus:outline-none
                            focus:ring-2 focus:ring-[#eb7d4d]">
                    <option value="">Semua Status</option>
                    <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>
                        Tersedia
                    </option>
                    <option value="borrowed" {{ request('status') == 'borrowed' ? 'selected' : '' }}>
                        Dipinjam
                    </option>
                </select>
                <a href="{{ route('book_section') }}"
                class="px-6 py-3 rounded-full border border-[#eb7d4d]
                        text-[#eb7d4d] font-semibold
                        hover:bg-[#eb7d4d] hover:text-white
                        transition duration-300">
                    Reset
                </a>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-full">
            <x-index.card-book :books="$books"/>
        </div>
    </div>
@endsection