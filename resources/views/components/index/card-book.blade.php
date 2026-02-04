
@forelse ($books as $book)
    <div class=" relative flex flex-col items-center justify-between min-h-[450px] bg-[#265949] pb-30 mb-20 gap-3 rounded-[16px] shadow-soft-green hover:-translate-y-4 transition ease-in-out duration-1000">
        <img src="{{ asset('img_upload/'.$book->cover) }}" class="w-full h-[200px] object-cover rounded-[16px]" alt="" onerror="this.onerror=null; this.src='{{ $book->cover }}'">
        <a href="{{ route('detail_book', $book->id) }}"><h3 class="text-2xl font-bold text-[#ede5d1] px-6">{{ $book->judul }}</h3></a>
        <div class="flex items-center justify-between w-full px-6">
            <p class="text-[#eb7d4d] font-semibold text-md">By {{ $book->penulis }}</p>
            <div class="flex items-center justify-center gap-1">
                <h3 class="text-white font-semibold ">{{ $book->rating }}</h3>
                <img src="{{ asset('img/star.png') }}" class="w-[16px]" alt="">
            </div>
        </div>
        <p class="text-white font-thin text-sm px-6 mb-20">{{ Str::limit($book->deskripsi, 100, '...') }}</p>

        <div class="flex w-[80%] items-center justify-center absolute left-50 -bottom-5">
            <a href="{{ route('borrowings.create', $book) }}" class="flex  w-full bg-[#eb7d4d]  items-center justify-center py-3  text-white font-bold hover:shadow-orange-glow hover:-translate-y-1 transition ease-in-out duration-1000 rounded-full">Pinjam Buku</a>
        </div>
    </div>
@empty
    <div class="flex items-center justify-center w-full my-16">
        <h1 class="text-4xl font-bold text-[#265949]">Buku Sedang Kosong</h1>
    </div>
@endforelse