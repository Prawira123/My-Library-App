@extends('layouts.index')

@section('content')

{{-- HERO SECTION --}}
<section class="w-full pb-32 pt-40 px-20 bg-[#ede5d1]/40 bg-cover" style="background-image: url('{{ asset('img/bg-cta2.png') }}')">
    <div class="max-w-6xl mx-auto text-center flex flex-col gap-4">
        <h1 class="text-5xl font-extrabold text-[#265949]">
            Hubungi <span class="text-[#eb7d4d]">Kami</span>
        </h1>
        <p class="text-[#6b6b6b] text-lg">
            Ada pertanyaan, saran, atau butuh bantuan?  
            Jangan sungkan buat reach out
        </p>
    </div>
</section>

{{-- CONTENT SECTION --}}
<section class="w-full py-24 px-20">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-16">

        {{-- LEFT INFO --}}
        <div class="flex flex-col gap-8">
            <div>
                <h2 class="text-3xl font-bold text-[#265949]">
                    Info <span class="text-[#eb7d4d]">Kontak</span>
                </h2>
                <p class="text-[#6b6b6b] mt-3">
                    Tim kami siap bantu kamu seputar peminjaman buku, akun,
                    atau hal teknis lainnya.
                </p>
            </div>

            <div class="flex flex-col gap-6">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-[#265949]/10 flex items-center justify-center">
                        📧
                    </div>
                    <div>
                        <p class="font-semibold text-[#265949]">Email</p>
                        <p class="text-sm text-[#6b6b6b]">support@my-library.com</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-[#265949]/10 flex items-center justify-center">
                        📞
                    </div>
                    <div>
                        <p class="font-semibold text-[#265949]">Telepon</p>
                        <p class="text-sm text-[#6b6b6b]">+62 812 3456 7890</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-[#265949]/10 flex items-center justify-center">
                        📍
                    </div>
                    <div>
                        <p class="font-semibold text-[#265949]">Alamat</p>
                        <p class="text-sm text-[#6b6b6b]">
                            Jalan Literasi No. 21, Indonesia
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- RIGHT FORM --}}
        <div class="bg-white rounded-2xl shadow-soft-green p-10">
            <h3 class="text-2xl font-bold text-[#265949] mb-6">
                Kirim <span class="text-[#eb7d4d]">Pesan</span>
            </h3>

            <form action="#" method="POST" class="flex flex-col gap-5">
                @csrf

                <div>
                    <label class="text-sm font-medium text-[#265949]">Nama</label>
                    <input type="text" placeholder="Nama kamu"
                        class="w-full mt-2 px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#eb7d4d]/60">
                </div>

                <div>
                    <label class="text-sm font-medium text-[#265949]">Email</label>
                    <input type="email" placeholder="email@example.com"
                        class="w-full mt-2 px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#eb7d4d]/60">
                </div>

                <div>
                    <label class="text-sm font-medium text-[#265949]">Pesan</label>
                    <textarea rows="5" placeholder="Tulis pesan kamu di sini..."
                        class="w-full mt-2 px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#eb7d4d]/60"></textarea>
                </div>

                <button
                    class="mt-4 w-full bg-[#eb7d4d] text-white font-bold py-3 rounded-lg hover:-translate-y-1 hover:shadow-orange-glow transition duration-300">
                    Kirim Pesan
                </button>
            </form>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="w-full py-20 bg-[#265949] text-white text-center bg-cover bg-center" style="background-image: url('{{ asset('img/bg-cta.png') }}')">
    <h2 class="text-4xl font-bold mb-4">
        Punya Ide atau Feedback?
    </h2>
    <p class="text-white/80 mb-8 font-medium">
        Kami terbuka untuk masukan biar My-Library makin keren
    </p>
    <a href="#"
        class="inline-block px-10 py-4 bg-[#265949] rounded-full font-bold hover:-translate-y-1 transition">
        Kirim Sekarang
    </a>
</section>

@endsection
