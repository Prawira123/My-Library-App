@extends('layouts.index')

@section('content')
     {{-- //hero section --}}
        <div class="relative flex w-full h-[100vh] overflow-hidden" id="hero-section">
            <div class="w-full flex flex-col bg-white justify-center items-start px-20 pt-20 gap-4" id="left-hero">
                <div class="flex w-full justify-start items-center pr-20">
                    <p class="text-small text-[#1A1A1A] w-[50%] -mb-8">Gratis, cepat, dan gak ribet.</p>
                    <div class="w-full h-[2px] bg-[#ede5d1] -mb-8"></div>
                </div>
                <h1 class="text-left font-bold text-7xl py-4 text-[#265949]">Perpustakaan Jadi Lebih <span class="text-[#eb7d4d]">Simpel</span>.</h1>
                <h3 class="text-left font-small text-xl pb-8 pr-20 text-[#8a8787]">Cari buku, pinjam lebih dari satu, atur tenggat sendiri,
    semua bisa langsung dari satu website.</h3>
                <a href="" class="text-white font-bold px-10 py-4 bg-[#eb7d4d] rounded-lg  hover:shadow-orange-glow hover:-translate-y-1 transition ease-in-out duration-1000" id="primary-btn">Daftar Sekarang</a>
            </div>
            <div class="relative w-[70%] flex flex-col bg-[#265949] justify-between items-center p-6 " id="right-hero">
            </div>
            <img src="{{ asset('img/book-hero.png') }}" class="absolute w-[800px] top-0 right-0 drop-shadow-soft-green" alt="">
        </div>

        {{-- //trusted by section --}}
        <div class="flex w-full h-auto gap-4 py-16 bg-[#fff] flex-col justify-between items-center" id="trusted-by">
            <h1 class="font-bold text-5xl text-[#265949] mb-4">Trusted <span class="text-[#eb7d4d]">By</span></h1>
            <div class="flex w-full justify-evenly items-center">
                <div class="flex flex-col items-center">
                    <img src="{{ asset('img/starbucks.png') }}" class="w-[80px] opacity-50" alt="">
                    <h3 class="text-[#8a8787] font-semibold">nama perusahaan</h3>
                </div>
                <div class="flex flex-col items-center">
                    <img src="{{ asset('img/starbucks.png') }}" class="w-[80px] opacity-50" alt="">
                    <h3 class="text-[#8a8787] font-semibold">nama perusahaan</h3>
                </div>
                <div class="flex flex-col items-center">
                    <img src="{{ asset('img/starbucks.png') }}" class="w-[80px] opacity-50" alt="">
                    <h3 class="text-[#8a8787] font-semibold">nama perusahaan</h3>
                </div>
                <div class="flex flex-col items-center">
                    <img src="{{ asset('img/starbucks.png') }}" class="w-[80px] opacity-50" alt="">
                    <h3 class="text-[#8a8787] font-semibold">nama perusahaan</h3>
                </div>
                <div class="flex flex-col items-center">
                    <img src="{{ asset('img/starbucks.png') }}" class="w-[80px] opacity-50" alt="">
                    <h3 class="text-[#8a8787] font-semibold">nama perusahaan</h3>
                </div>
            </div>
        </div>

        {{-- //about-me section --}}
        <div class="flex w-full h-auto gap-4 py-4 bg-[#fff] flex-col justify-between items-center" id="about-me">
            <div class="relative w-full h-auto ">
                <img src="{{ asset('img/about.png') }}" alt="">
                <div class="absolute top-[30%] left-0 flex flex-col justify-center items-start gap-4 bg-white w-[50%] h-[50%] px-10 shadow-gray">
                    <h1 class="text-5xl text-[#265949] font-bold ">Perpustakaan Versi Lebih <span class="text-[#eb7d4d]">Modern</span></h1>
                    <p class="  text-[#8a8787] text-justify pr-10">My-Library bikin pengalaman perpustakaan naik level. Dari cari buku sampai pinjam dan balikin, semuanya serba cepat dan tertata. Bisa pinjam lebih dari satu buku, atur tenggat sendiri, dan pantau riwayat tanpa drama. Perpustakaan jadi lebih simple, modern, dan siap dipakai kapan aja.</p>
                </div>
            </div>
        </div>

        {{-- //fitur-section --}}
        <div class="flex flex-col w-full h-auto p-30 items-center justify-center my-16" id="fitur-section">
            <h1 class="text-5xl font-bold text-[#265949] mb-16">Kenapa Pakai <span class="text-[#eb7d4d]">Website</span> Ini?</h1>
            <div class="flex items-center justify-between w-[80%] h-auto gap-5">
                <div class=" flex flex-col justfy-between items-center w-[60%] h-[300px] bg-[#fff] p-10 shadow-soft-gray hover:-translate-y-4 transition ease-in-out duration-1000 rounded-[10px] gap-4">
                    <img src="{{ asset('img/search.png') }}" alt="" class="w-[100px]">
                    <h3 class="text-2xl text-[#265949] font-bold text-center">Cari Buku Cepat</h3>
                    <p class="text-[#8a8787] text-[12px] text-center font-medium ">Tinggal ketik judul atau penulis, buku langsung ketemu.</p>
                </div>
                <div class=" flex flex-col justfy-between items-center w-[60%] h-[300px] bg-[#fff] p-10 shadow-soft-gray hover:-translate-y-4 transition ease-in-out duration-1000 rounded-[10px] gap-4">
                    <img src="{{ asset('img/trolley.png') }}" alt="" class="w-[100px]">
                    <h3 class="text-2xl text-[#265949] font-bold text-center">Keranjang Peminjaman</h3>
                    <p class="text-[#8a8787] text-[12px] text-center font-medium ">Pinjam banyak buku sekaligus, kayak belanja online.</p>
                </div>
                <div class=" flex flex-col justfy-between items-center w-[60%] h-[300px] bg-[#fff] p-10 shadow-soft-gray hover:-translate-y-4 transition ease-in-out duration-1000 rounded-[10px] gap-4">
                    <img src="{{ asset('img/clock.png') }}" alt="" class="w-[100px]">
                    <h3 class="text-2xl text-[#265949] font-bold text-center">Tenggat Fleksibel</h3>
                    <p class="text-[#8a8787] text-[12px] text-center font-medium ">Setiap buku punya tanggal pinjam & kembali sendiri.</p>
                </div>
                <div class=" flex flex-col justfy-between items-center w-[60%] h-[300px] bg-[#fff] p-10 shadow-soft-gray hover:-translate-y-4 transition ease-in-out duration-1000 rounded-[10px] gap-4">
                    <img src="{{ asset('img/document.png') }}" alt="" class="w-[100px]">
                    <h3 class="text-2xl text-[#265949] font-bold text-center">Riwayat Jelas</h3>
                    <p class="text-[#8a8787] text-[12px] text-center font-medium ">Semua aktivitas peminjaman tersimpan dan bisa dicek kapan aja.</p>
                </div>
            </div>
        </div>

        {{-- //book-section --}}
        <div class="flex flex-col items-center justify-center w-full p-20 h-auto mb-16" id="book-section">
            <div class="flex items-center justify-between w-[80%] mb-32">
                <div class="flex flex-col items-start justify-between w-full">
                    <h1 class="text-4xl font-bold text-[#265949]">Koleksi Buku <span class="text-[#eb7d4d]">Pilihan</span></h1>
                    <h3 class="text-[#8a8787] font-medium">Beberapa Buku yang sering dipinjam</h3>
                </div>
                <div class="w-full h-[2px] bg-[#eb7d4d] "></div>
                <div class="flex w-[30%] items-center justify-end">
                    <a href="" class="px-3 py-3 bg-[#eb7d4d] rounded-full text-white font-bold hover:shadow-orange-glow hover:-translate-y-1 transition ease-in-out duration-1000 text-white"><img src="{{ asset('img/right-arrow (1).png') }}" alt="" class="w-[20px]"></a>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-[80%]">
                <x-index.card-book :books="$books"/>
            </div>
        </div>

        <div class="w-full bg-[#eb7d4d]">
            <div class="max-w-7xl mx-auto px-20 py-24 flex flex-col gap-16">

                <!-- Heading -->
                <div class="text-center text-white flex flex-col gap-4">
                    <h1 class="text-5xl font-bold">
                        Alur Peminjaman <span class="text-[#265949]">Buku</span>
                    </h1>
                    <p class="font-semibold text-lg text-[#265949]">
                        Ikuti jalurnya, dari daftar sampai buku di tangan.
                    </p>
                </div>

                <!-- Path -->
                <div class="relative w-full">

                    <!-- Line -->
                    <div class="absolute top-1/2 left-0 w-full h-[3px] bg-white/40 -translate-y-1/2"></div>

                    <!-- Steps -->
                    <div class="relative flex justify-between items-center">

                        <!-- Step 1 -->
                        <div class="flex flex-col items-center text-center max-w-[180px] text-white">
                            <div class="w-14 h-14 rounded-full bg-[#265949] text-[#fff] font-bold flex items-center justify-center mb-4">
                                01
                            </div>
                            <h3 class="font-semibold">Daftar Akun</h3>
                            <p class="text-sm text-white/90">
                                Buat akun buat mulai pinjam buku.
                            </p>
                        </div>

                        <!-- Step 2 -->
                        <div class="flex flex-col items-center text-center max-w-[180px] text-white">
                            <div class="w-14 h-14 rounded-full bg-[#265949] text-[#fff] font-bold flex items-center justify-center mb-4">
                                02
                            </div>
                            <h3 class="font-semibold">Cari Buku</h3>
                            <p class="text-sm text-white/90">
                                Temuin buku favorit lewat search.
                            </p>
                        </div>

                        <!-- Step 3 -->
                        <div class="flex flex-col items-center text-center max-w-[180px] text-white">
                            <div class="w-14 h-14 rounded-full bg-[#265949] text-[#fff] font-bold flex items-center justify-center mb-4">
                                03
                            </div>
                            <h3 class="font-semibold">Masuk Keranjang</h3>
                            <p class="text-sm text-white/90">
                                Pinjam lebih dari satu, atur tenggat.
                            </p>
                        </div>

                        <!-- Step 4 -->
                        <div class="flex flex-col items-center text-center max-w-[180px] text-white">
                            <div class="w-14 h-14 rounded-full bg-[#265949] text-[#fff] font-bold flex items-center justify-center mb-4">
                                04
                            </div>
                            <h3 class="font-semibold">Konfirmasi</h3>
                            <p class="text-sm text-white/90">
                                Admin setujui, buku siap diambil.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="cta-section" class=" relative w-full h-full bg-cover bg-center bg-no-repeat ">
            <img src="{{ asset('img/bg-cta2.png') }}" class="drop-shadow-soft-green" alt="">
            <div class="absolute top-1/3 left-50 w-full flex flex-col items-center justify-center gap-10">
                <h1 class="text-5xl text-[#265949] font-bold px-[300px] text-center drop-shadow-soft-green">Siap Bikin Urusan <span class="text-[#eb7d4d]">Buku</span> Jadi Lebih <span class="text-[#eb7d4d]">Mudah</span> ?</h1>
                <h3 class="text-lg text-[#8a8787] font-medium">Gabung sekarang dan rasakan pengalaman perpustakaan yang lebih praktis.</h3>
                <a href="" class="px-10 py-5 rounded-full bg-[#eb7d4d] text-white font-medium shadow-orange-glow hover:-translate-y-1 transition ease-in-out duration-1000">Daftar Gratis Sekarang</a>
            </div>
        </div>
@endsection