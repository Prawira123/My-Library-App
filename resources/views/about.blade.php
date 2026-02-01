@extends('layouts.index')

@section('content')

<!-- HERO / INTRO -->
<section class="w-full pt-48 pb-24 px-20 bg-[#ede5d1]/40 bg-cover bg-center"
    style="background-image: url('{{ asset('img/bg-cta2.png') }}');">
    <div class="max-w-6xl mx-auto text-center flex flex-col gap-6">
        <h1 class="text-6xl font-bold text-[#265949] drop-shadow-soft-gray">
            Tentang <span class="text-[#eb7d4d]">My-Library</span>
        </h1>
        <p class="text-lg text-[#265949]/80 leading-relaxed max-w-3xl mx-auto">
            Platform perpustakaan digital yang dirancang untuk membuat proses
            <span class="text-[#eb7d4d] font-semibold">peminjaman buku</span>
            menjadi lebih mudah, cepat, dan terorganisir.
        </p>
    </div>
</section>

<!-- VISI -->
<section class="w-full py-24 px-20 bg-white">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-16 items-center">

        <div class="flex flex-col gap-6">
            <h2 class="text-5xl font-bold text-[#265949]">
                Visi <span class="text-[#eb7d4d]">Kami</span>
            </h2>
            <p class="text-[#265949]/80 leading-relaxed text-lg">
                Menjadi platform perpustakaan digital yang
                <span class="text-[#eb7d4d] font-semibold">inovatif</span>,
                <span class="text-[#eb7d4d] font-semibold">mudah diakses</span>,
                dan mampu meningkatkan minat baca melalui teknologi yang
                sederhana namun efektif.
            </p>
        </div>

        <div class="w-full h-[280px] rounded-2xl bg-[#265949]/10 flex items-center justify-center overflow-hidden shadow-soft-gray">
            <img src="{{ asset('img/about.png') }}" class="w-full h-full " alt="">
        </div>

    </div>
</section>

<!-- MISI -->
<section class="relative overflow-hidden w-full py-24 px-20 bg-[#265949]">
    <div class="max-w-6xl mx-auto flex flex-col gap-16">

        <div class="bg-[#eb7d4d]/90 w-[400px] h-[400px] rounded-full absolute -bottom-[100px] -right-[150px]"></div>
        <div class="bg-[#eb7d4d] w-[300px] h-[300px] rounded-full absolute -top-[100px] -left-[150px]"></div>

        <h2 class="text-4xl font-bold text-white text-center">
            Misi <span class="text-[#eb7d4d]">Kami</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <div class=" relative p-8 rounded-2xl bg-white/10 backdrop-blur overflow-hidden">
                <h3 class="text-xl font-bold text-[#eb7d4d] mb-4">
                    Akses Mudah
                </h3>
                <h1 class="text-9xl text-[#265949] font-extrabold absolute -top-10 -right-[20px]">01</h1>
                <p class="text-white/80 leading-relaxed">
                    Memberikan kemudahan akses buku kapan saja dan di mana saja
                    tanpa proses yang rumit.
                </p>
            </div>

            <div class="relative overflow-hidden p-8 rounded-2xl bg-white/10 backdrop-blur">
                <h3 class="text-xl font-bold text-[#eb7d4d] mb-4">
                    Sistem Terorganisir
                </h3>
                <h1 class="text-9xl text-[#265949] font-extrabold absolute -top-10 -right-[20px]">02</h1>
                <p class="text-white/80 leading-relaxed">
                    Mengelola data buku dan peminjaman dengan sistem yang rapi,
                    transparan, dan efisien.
                </p>
            </div>

            <div class="relative overflow-hidden p-8 rounded-2xl bg-white/10 backdrop-blur">
                <h3 class="text-xl font-bold text-[#eb7d4d] mb-4">
                    Mendukung Literasi
                </h3>
                <h1 class="text-9xl text-[#265949] font-extrabold absolute -top-10 -right-[20px]">03</h1>
                <p class="text-white/80 leading-relaxed">
                    Mendorong budaya membaca dengan pengalaman digital yang
                    menyenangkan.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- NILAI -->
<section class="w-full py-24 px-20 bg-white">
    <div class="max-w-6xl mx-auto flex flex-col gap-16">

        <div class="text-center drop-shadow-soft-green">
            <h2 class="text-5xl font-bold text-[#265949]">
                Nilai <span class="text-[#eb7d4d]">Utama</span>
            </h2>
            <p class="text-[#265949]/70 mt-4">
                Prinsip yang menjadi dasar dalam pengembangan My-Library
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-xl">

            <div class="flex flex-col gap-3">
                <h4 class="font-bold text-[#265949]">
                    Sederhana
                </h4>
                <p class="text-sm text-[#265949]/70">
                    Mudah digunakan oleh semua kalangan.
                </p>
            </div>

            <div class="flex flex-col gap-3">
                <h4 class="font-bold text-[#265949]">
                    Transparan
                </h4>
                <p class="text-sm text-[#265949]/70">
                    Informasi peminjaman jelas dan terbuka.
                </p>
            </div>

            <div class="flex flex-col gap-3">
                <h4 class="font-bold text-[#265949]">
                    Efisien
                </h4>
                <p class="text-sm text-[#265949]/70">
                    Menghemat waktu dan tenaga pengguna.
                </p>
            </div>

            <div class="flex flex-col gap-3">
                <h4 class="font-bold text-[#265949]">
                    Berkelanjutan
                </h4>
                <p class="text-sm text-[#265949]/70">
                    Mendukung pengelolaan literasi jangka panjang.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- CTA -->
<section
    class="w-full py-24 px-20 bg-[#ede5d1]/40 bg-cover bg-center"
    style="background-image: url('{{ asset('img/bg-cta3.png') }}');"
>    <div class="max-w-5xl mx-auto text-center flex flex-col gap-8">
        <h2 class="text-5xl font-bold text-[#265949]">
            Mulai Jelajahi <span class="text-[#eb7d4d]">Buku Favoritmu</span>
        </h2>
        <p class="text-[#265949]/70 text-lg">
            Temukan berbagai koleksi buku pilihan dan nikmati pengalaman
            peminjaman yang lebih simpel.
        </p>
        <div class="flex justify-center">
            <a href="{{ route('book_section') }}"
               class="px-10 py-4 bg-[#eb7d4d] text-white font-bold rounded-full
                      hover:shadow-orange-glow hover:-translate-y-1
                      transition duration-500">
                Jelajahi Buku
            </a>
        </div>
    </div>
</section>

@endsection
