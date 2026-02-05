<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
    <style>
        .active{
            background-color: #eb7d4d;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
        }

        .hover{
            background-color: #eb7d4d/8;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    @if (session('role') == 'member')   
        <header class="px-20 py-3 w-full bg-white fixed z-50 top-0 left-0">
            <nav class="flex justify-between w-full items-center">
                <h1 class="text-[#265949] font-bold text-2xl w-full">My-Library</h1>
                <div class="w-full">
                    <ul class="flex justify-evenly items-center">
                        <li><a href="{{ route('home_member') }}" class="font-medium text-[#1A1A1A] hover:text-[#eb7d4d] transition all ease-in-out duration-500 {{ request()->routeIs('home_member') ? 'active' : '' }}">Home</a></li>
                        <li><a href="{{ route('book_section') }}" class="font-medium text-[#1A1A1A] hover:text-[#eb7d4d] transition all ease-in-out duration-500 {{ request()->routeIs('book_section') ? 'active' : '' }}">Books</a></li>
                        <li><a href="{{ route('book_section') }}" class="font-medium text-[#1A1A1A] hover:text-[#eb7d4d] transition all ease-in-out duration-500 {{ request()->routeIs('book_section') ? 'active' : '' }}">History</a></li>
                        <li><a href="{{ route('profiles.index') }}" class="font-medium text-[#1A1A1A] hover:text-[#eb7d4d] transition all ease-in-out duration-500 {{ request()->routeIs('profiles*') ? 'active' : '' }}">Profile</a></li>
                    </ul>
                </div>
                <div class="w-full">
                    <ul class="flex justify-end items-center gap-4">
                        <a href=""><img src="{{ asset('img/about.png') }}" alt="" class="w-[60px] h-[60px] rounded-full shadow-soft-green"></a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <li><button type="submit" class="px-4 py-2 bg-[#265949] rounded-lg text-white font-medium hover:opacity-80 transaition ease-in-out duration-150">Log Out</button></li>
                        </form>
                    </ul>
                </div>
            </nav>
        </header>
    @elseif(session('role') == null )
        <header class="px-20 py-6 w-full bg-white fixed z-50 top-0 left-0">
                <nav class="flex justify-between w-full items-center">
                    <h1 class="text-[#265949] font-bold text-2xl w-full">My-Library</h1>
                    <div class="w-full">
                        <ul class="flex justify-evenly items-center">
                            <li><a href="{{ route('home') }}" class="font-medium text-[#1A1A1A] hover:text-[#eb7d4d] transition all ease-in-out duration-500 {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('about_us') }}" class="font-medium text-[#1A1A1A] hover:text-[#eb7d4d] transition all ease-in-out duration-500 {{ request()->routeIs('about_us') ? 'active' : '' }}">About Us</a></li>
                            <li><a href="{{ route('book_section') }}" class="font-medium text-[#1A1A1A] hover:text-[#eb7d4d] transition all ease-in-out duration-500 {{ request()->routeIs('book_section') ? 'active' : '' }}">Books</a></li>
                            <li><a href="{{ route('contact_us') }}" class="font-medium text-[#1A1A1A] hover:text-[#eb7d4d] transition all ease-in-out duration-500 {{ request()->routeIs('contact_us') ? 'active' : '' }}">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="w-full">
                        <ul class="flex justify-end items-center gap-2">
                            <li><a href="{{ route('login') }}" class="px-6 py-3 bg-[#eb7d4d] rounded-md text-white font-medium hover:opacity-80 transaition ease-in-out duration-150">Login</a></li>
                            <li><a href="{{ route('register') }}" class="px-6 py-3 bg-[#265949] rounded-md text-white font-medium hover:opacity-80 transaition ease-in-out duration-150">Register</a></li>
                        </ul>
                    </div>
                </nav>
            </header>
        @endif
    <main class="">
        @yield('content')
    </main>

    <footer class="w-full bg-[#265949] text-white">
    <div class="max-w-7xl mx-auto px-20 py-16 flex flex-col gap-12">

        <div class="grid grid-cols-1 md:grid-cols-4 gap-10">

            <div class="flex flex-col gap-4">
                <h1 class="text-2xl font-bold">My-Library</h1>
                <p class="text-sm text-white/80 leading-relaxed">
                    Pinjam buku jadi lebih simpel, cepat, dan tanpa ribet.
                </p>
            </div>

            <div>
                <h3 class="font-semibold mb-4 text-[#eb7d4d]">Menu</h3>
                <ul class="flex flex-col gap-2 text-sm text-white/80">
                    <li><a href="#" class="hover:text-white transition">Home</a></li>
                    <li><a href="#" class="hover:text-white transition">About Us</a></li>
                    <li><a href="#" class="hover:text-white transition">Books</a></li>
                    <li><a href="#" class="hover:text-white transition">Contact Us</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold mb-4 text-[#eb7d4d]">Explore</h3>
                <ul class="flex flex-col gap-2 text-sm text-white/80">
                    <li><a href="#" class="hover:text-white transition">Koleksi Populer</a></li>
                    <li><a href="#" class="hover:text-white transition">Cara Peminjaman</a></li>
                    <li><a href="#" class="hover:text-white transition">FAQ</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold mb-4 text-[#eb7d4d]">Follow Us</h3>
                <ul class="flex flex-col gap-2 text-sm text-white/80">
                    <li><a href="#" class="hover:text-white transition">Instagram</a></li>
                    <li><a href="#" class="hover:text-white transition">Twitter</a></li>
                    <li><a href="#" class="hover:text-white transition">Threads</a></li>
                </ul>
            </div>

        </div>

        <div class="w-full h-px bg-[#eb7d4d]/90"></div>

        <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-white/70">
            <p>© 2026 My-Library. All rights reserved.</p>
            <p>Built for readers, powered by simplicity 📚</p>
        </div>

    </div>
</footer>

</body>
</html>