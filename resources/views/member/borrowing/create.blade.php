@extends('../layouts.index')

@section('content')
    {{-- FORM PEMINJAMAN --}}
<div class="w-full flex flex-col bg-white rounded-2xl items-center shadow-soft-green gap-10 p-8 mt-12">

    <div class="w-full flex items-center justify-between">
        <h3 class=" flex w-full items-center justify-center text-2xl font-bold text-[#265949] mb-6">
            Form <span class="text-[#eb7d4d]">Peminjaman</span>
        </h3>

        <a href="{{ route('detail_book', $book->id) }}" class=" px-4 py-3 border text-white bg-[#265949] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#265949]/60">Kembali</a>
    </div>
    <div class="w-full flex items-center gap-10 justify-between">
        <div class="flex justify-center">
            <img
                src="{{ asset('img_upload/'.$book->cover) }}"
                alt="{{ $book->judul }}"
                onerror="this.onerror=null;this.src='{{ $book->cover }}'"
                class="w-[350px] h-[460px] object-cover object-center rounded-2xl shadow-soft-green"
            >
        </div>

        <form method="POST" action="{{ route('borrowings.store', $book->id) }}" class="w-full flex flex-col gap-6">
            @csrf
            <div class="w-full flex items-center justify-between gap-6">
                <div class="w-full">
                    <label class="block text-sm font-medium text-[#265949] mb-2">
                        Judul Buku
                    </label>
                    <input
                        type="text"
                        value="{{ $book->judul }}"
                        class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#eb7d4d]/60"
                        readonly
                    >
                </div>
                <div class="w-full">
                    <label class="block text-sm font-medium text-[#265949] mb-2">
                        Kategori Buku
                    </label>
                    <input
                        type="text"
                        value="{{ $book->category->name }}"
                        class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#eb7d4d]/60"
                        readonly
                    >
                </div>
            </div>
            <div class="w-full">
                <label class="block text-sm font-medium text-[#265949] mb-2">
                    Jumlah Buku
                </label>
                <input
                    type="number"
                    name="qty"
                    min="1"
                    max="{{ $book->stok }}"
                    value="1"
                    class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#eb7d4d]/60"
                    required
                >
                <p class="text-xs text-gray-500 mt-1">
                    Stok tersedia: {{ $book->stok }}
                </p>
            </div>
            <div>
                <label class="block text-sm font-medium text-[#265949] mb-2">
                    Tanggal Pinjam
                </label>
                <input
                    type="date"
                    name="tanggal_pinjam"
                    value="{{ now()->toDateString() }}"
                    class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#eb7d4d]/60"
                    required
                >
            </div>
            <div>
                <label class="block text-sm font-medium text-[#265949] mb-2">
                    Tanggal Pengembalian
                </label>
                <input
                    type="date"
                    name="tanggal_kembali"
                    class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#eb7d4d]/60"
                    required
                >
            </div>
            <div class="flex md:flex-row gap-4 mt-6">
                <button
                    type="submit"
                    name="action"
                    value="cart"
                    class="w-full md:w-1/2 px-6 py-4 rounded-full font-bold
                           border-2 border-[#eb7d4d] text-[#eb7d4d]
                           hover:bg-[#eb7d4d] hover:text-white
                           transition duration-300">
                    + Masukkan ke Keranjang
                </button>
                <button
                    type="submit"
                    name="action"
                    value="borrow"
                    class="w-full md:w-1/2 px-6 py-4 rounded-full font-bold
                           bg-[#eb7d4d] text-white
                           hover:-translate-y-1 hover:shadow-orange-glow
                           transition duration-300">
                    Pinjam Sekarang
                </button>
            </div>
        </form>
    </div>
</div>

@endsection