<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
    <header class="px-20 py-6 w-full bg-white fixed z-50 top-0 left-0">
        <nav class="flex justify-between w-full items-center">
            <h1 class="text-[#265949] font-bold text-2xl w-full">My-Library</h1>
            <div class="w-full">
                <ul class="flex justify-evenly items-center">
                    <li><a href="" class="font-medium text-[#1A1A1A]">Home</a></li>
                    <li><a href="" class="font-medium text-[#1A1A1A]">About Us</a></li>
                    <li><a href="" class="font-medium text-[#1A1A1A]">Books</a></li>
                    <li><a href="" class="font-medium text-[#1A1A1A]">Contact Us</a></li>
                </ul>
            </div>
            <div class="w-full">
                <ul class="flex justify-end items-center gap-2">
                    <li><a href="" class="px-6 py-3 bg-[#eb7d4d] rounded-md text-white font-medium hover:opacity-80 transaition ease-in-out duration-150">Login</a></li>
                    <li><a href="" class="px-6 py-3 bg-[#265949] rounded-md text-white font-medium hover:opacity-80 transaition ease-in-out duration-150">Register</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="">
        {{-- //hero section --}}
        <div class="relative flex w-full h-[100vh] overflow-hidden" id="hero-section">
            <div class="w-full flex flex-col bg-white justify-center items-start px-20 pt-20 gap-4" id="left-hero">
                <div class="flex w-full justify-start items-center pr-20">
                    <p class="text-small text-[#1A1A1A] w-[50%]">Gratis, cepat, dan gak ribet.</p>
                    <div class="w-full h-[2px] bg-[#ede5d1]"></div>
                </div>
                <h1 class="text-left font-bold text-7xl py-4 text-[#1A1A1A]">Perpustakaan Jadi Lebih <span class="text-[#265949]">Simpel</span>.</h1>
                <h3 class="text-left font-small text-xl pb-8 pr-20 text-[#8a8787]">Cari buku, pinjam lebih dari satu, atur tenggat sendiri,
    semua bisa langsung dari satu website.</h3>
                <a href="" class="text-white font-bold px-10 py-4 bg-[#eb7d4d] rounded-lg shadow-lg hover:shadow-lg hover:-translate-y-1 hover:shadow-lg transition ease-in-out duration-900" id="primary-btn">Daftar Sekarang</a>
            </div>
            <div class="relative w-[70%] flex flex-col bg-[#265949] justify-between items-center p-6 " id="right-hero">
            </div>
            <img src="{{ asset('img/book-hero.png') }}" class="absolute w-[800px] top-0 right-0" alt="">
        </div>

        {{-- //trusted by section --}}
        <div class="flex w-full h-auto gap-4 py-6 bg-[#fff] flex-col justify-between items-center" id="trusted-by">
            <h1 class="font-bold text-4xl text-[#265949] mb-4">Trusted By</h1>
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
            <div class="w-full ">
                <img src="{{ asset('img/about.png') }}" alt="">
            </div>
            <div class="flex flex-col justify-center items-center gap-3">
                <h1 class="text-4xl text-[#265949] font-bold ">Perpustakaan Versi Lebih <span class="text-[#eb7d4d]">Modern</span></h1>
                <p class="text-[#8a8787] text-center">Website ini dibuat buat kamu yang pengen urusan pinjam buku jadi lebih gampang.
Tanpa ribet, tanpa kertas, semua tercatat rapi dan transparan.</p>
            </div>
        </div>

        {{-- //fitur-section --}}
        <div class="" id="fitur-section">
            <h1>Kenapa Pakai Website Ini?</h1>
            <div class="">
                <div class="">
                    <img src="" alt="">
                    <h3>desk</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, nihil.</p>
                </div>
                <div class="">
                    <img src="" alt="">
                    <h3>desk</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, nihil.</p>
                </div>
                <div class="">
                    <img src="" alt="">
                    <h3>desk</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, nihil.</p>
                </div>
                <div class="">
                    <img src="" alt="">
                    <h3>desk</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, nihil.</p>
                </div>
            </div>
        </div>

        {{-- //book-section --}}
        <div class="" id="book-section">
            <div class="">
                <div class="">
                    <h1>Koleksi Buku Pilihan</h1>
                    <h3>Beberapa Buku yang sering dipinjam</h3>
                </div>
                <div class="">
                    <a href="">Lihat Semua</a>
                </div>
            </div>
            <div class="">
                <div class="">
                    <img src="" alt="">
                    <h3>desk</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, nihil.</p>

                    <div class="">
                        <a href="">Pinjam Buku</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="" id="cta-section">
            <h1>Siap Bikin Urusan Buku Jadi Lebih Mudah?</h1>
            <h3>Gabung sekarang dan rasakan pengalaman perpustakaan yang lebih praktis.</h3>
            <a href="">Daftar Gratis Sekarang</a>
        </div>
    </main>

    <footer>
        <div class="">
            <div class="">
                <img src="" alt="">
                <h3>Pinjam buku jadi lebih simpel.</h3>
            </div>
            <div class="">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Books</a></li>
                    <li><a href="">Contact Us</a></li>
                </ul>
            </div>
            <div class="">
                <ul>
                    <li>Instagram</li>
                    <li>Twitter</li>
                    <li>Threads</li>
                </ul>
            </div>
            <div class="">
                <h3>© 2026 Libry. All rights reserved.</h3>
            </div>
        </div>
    </footer>
</body>
</html>