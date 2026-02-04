@extends('layouts.index')

@section('content')

{{-- DETAIL BOOK --}}
<section class="w-full px-20 py-32 bg-[#ede5d1]/40 bg-cover bg-center drop-shadow-soft-green"
style="background-image: url('{{ asset('img/bg-cta2.png') }}')">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-16">

        {{-- COVER --}}
        <div class="flex justify-center">
            <img
                src="{{ asset('img_upload/'.$book->cover) }}"
                alt="{{ $book->judul }}"
                onerror="this.onerror=null;this.src='{{ $book->cover }}'"
                class="w-[320px] h-[460px] object-cover rounded-2xl shadow-soft-green"
            >
        </div>

        {{-- INFO --}}
        <div class="flex flex-col gap-6">
            <div>
                <h1 class="text-4xl font-bold text-[#265949]">
                    {{ $book->judul }}
                </h1>
                <p class="text-[#eb7d4d] font-semibold mt-2">
                    {{ $book->penulis }}
                </p>
            </div>

            <div class="flex items-center gap-6 text-sm text-[#6b6b6b]">
                <span>Penerbit: <b class="text-[#265949]">{{ $book->penerbit }}</b></span>
                <span>Tahun: <b class="text-[#265949]">{{ $book->tahun_terbit }}</b></span>
            </div>

            <div class="flex items-center gap-4">
                <div class="flex items-center gap-1">
                    <span class="text-[#265949] font-semibold">{{ $book->rating }}</span>
                    <img src="{{ asset('img/star.png') }}" class="w-4" alt="">
                </div>

                <span class="px-3 py-1 text-sm rounded-full bg-[#265949]/10 text-[#265949]">
                    <a href="">{{ $book->category->name }}</a>
                </span>
            </div>

            <div>
                <h3 class="text-xl font-semibold text-[#265949] mb-2">
                    Deskripsi
                </h3>
                <p class="text-[#6b6b6b] leading-relaxed">
                    {{ $book->deskripsi }}
                </p>
            </div>

            <div class="flex items-center gap-6">
                <p class="text-sm">
                    Stok:
                    <span class="font-bold text-[#265949]">
                        {{ $book->stok }}
                    </span>
                </p>

                <p class="text-sm">
                    Status:
                    <span class="font-bold {{ $book->status === 'aktif' ? 'text-green-600' : 'text-red-500' }}">
                        {{ ucfirst($book->status) }}
                    </span>
                </p>
            </div>

            {{-- BUTTON --}}
            <div class="mt-8">
                @if ($book->stok > 0 && $book->status === 'aktif')
                    <a href="{{ route('borrowings.create', $book ) }}"
                        class="inline-block px-12 py-4 bg-[#eb7d4d] text-white font-bold rounded-full
                               hover:-translate-y-1 hover:shadow-orange-glow transition duration-300">
                        Pinjam Buku
                    </a>
                @else
                    <button
                        class="px-12 py-4 bg-gray-400 text-white font-bold rounded-full cursor-not-allowed">
                        Buku Tidak Tersedia
                    </button>
                @endif
            </div>
        </div>

    </div>
</section>

{{-- REKOMENDASI --}}
<section class="w-full px-20 py-24">
    <div class="max-w-6xl mx-auto">

        <h2 class="text-3xl font-bold text-[#265949] mb-10">
            Buku <span class="text-[#eb7d4d]">Serupa</span>
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            @forelse ($relatedBooks as $item)
                <a href="{{ route('detail_book', $item->id) }}"
                   class="group flex flex-col gap-3">

                    <img
                        src="{{ asset('img_upload/'.$item->cover) }}"
                        onerror="this.onerror=null;this.src='{{ $item->cover }}'"
                        class="h-[260px] w-full object-cover rounded-xl group-hover:-translate-y-2 transition duration-300"
                        alt=""
                    >

                    <h3 class="font-semibold text-[#265949] group-hover:text-[#eb7d4d] transition">
                        {{ $item->judul }}
                    </h3>

                    <p class="text-sm text-[#6b6b6b]">
                        {{ $item->penulis }}
                    </p>
                </a>
            @empty
                <p class="text-[#6b6b6b]">Belum ada rekomendasi buku.</p>
            @endforelse
        </div>

    </div>
</section>

@endsection
