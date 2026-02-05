@extends('layouts.index')

@section('content')

{{-- PROFILE HEADER --}}
<section class="w-full px-20 pb-20 pt-[160px] bg-[#265949]" style="background-image: url({{ asset('img_member_upload/'. $user->bg_img) }})">
    <div class=" relative max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-10">

        {{-- AVATAR --}}
        <div class="relative">
            <img
                src="{{ asset('img_profile/'.$user->img_profile) }}"
                onerror="this.onerror=null;this.src='{{ asset('img_member_upload/no_img.png') }}'"
                class="w-36 h-36 object-cover rounded-full border-4 border-[#eb7d4d]"
                alt=""
            >
        </div>

        {{-- USER INFO --}}
        <div class="text-white flex flex-col gap-2">
            <h1 class="text-3xl font-bold">
                {{ $user->nama }}
            </h1>

            <p class="text-[#ede5d1] text-sm">
                No Anggota: <span class="font-semibold">{{ $user->no_anggota }}</span>
            </p>

            <p class="text-sm">
                📍 {{ $user->alamat }}
            </p>

            <p class="text-sm">
                📞 {{ $user->no_hp }}
            </p>
        </div>
        <div class="absolute top-0 right-0">
            <form action="" enctype="multipart/form-data" method="post">
                @csrf


            </form>
            <a class="px-6 py-4 bg-[#eb7d4d] text-white font-bold rounded-full hover:-translate-y-1 transition">edit background</a>
        </div>
    </div>
</section>

{{-- MAIN SECTION --}}
<section class="w-full px-20 py-24 bg-[#ede5d1]/50">
    <div class="max-w-6xl mx-auto">

        {{-- TAB MENU --}}
        <div class="flex flex-wrap gap-6 mb-12">
            <button class="tab-btn active" data-tab="dipinjam">Sedang Dipinjam</button>
            <button class="tab-btn" data-tab="riwayat">Ditunggu</button>
            <button class="tab-btn" data-tab="kembali">Pengembalian</button>
            <button class="tab-btn" data-tab="pengaturan">Pengaturan</button>
        </div>

        {{-- TAB CONTENT --}}
        <div class="bg-white rounded-2xl shadow-soft-green p-10">
            
            <div id="riwayat" class="tab-content hidden">
                <h2 class="text-2xl font-bold text-[#265949] mb-6">
                    Peminjaman <span class="text-[#eb7d4d]">Yang ditunggu</span>
                </h2>

                @forelse ($borrowings_pending as $item)
                    <div class="flex justify-between border-b py-4">
                        <div>
                            <h3 class="font-semibold text-[#265949]">
                                {{ $item->book->judul }}
                            </h3>
                            <p class="text-sm text-gray-500">
                                {{ $item->tanggal_pinjam }} → {{ $item->tanggal_kembali_aktual ?? '-' }}
                            </p>
                        </div>

                        <span class="text-sm text-gray-600">
                            {{ ucfirst($item->status) }}
                        </span>
                    </div>
                @empty
                    <p class="text-gray-500">Belum ada peminjaman yang sedang ditunggu.</p>
                @endforelse
            </div>

            {{-- SEDANG DIPINJAM --}}
            <div id="dipinjam" class="tab-content">
                <h2 class="text-2xl font-bold text-[#265949] mb-6">
                    Buku <span class="text-[#eb7d4d]">Sedang Dipinjam</span>
                </h2>

                @forelse ($borrowings_active as $item)
                    <div class="flex justify-between border-b py-4">
                        <div>
                            <h3 class="font-semibold text-[#265949]">
                                {{ $item->book->judul }}
                            </h3>
                            <p class="text-sm text-gray-500">
                                Qty: {{ $item->qty }} | Pinjam: {{ $item->tanggal_pinjam }}
                            </p>
                        </div>

                        <span class="px-4 py-1 rounded-full bg-yellow-100 text-yellow-600 text-sm">
                            {{ ucfirst($item->status) }}
                        </span>
                    </div>
                @empty
                    <p class="text-gray-500">Tidak ada buku yang sedang dipinjam.</p>
                @endforelse
            </div>

            {{-- PENGEMBALIAN --}}
            <div id="kembali" class="tab-content hidden">
                <h2 class="text-2xl font-bold text-[#265949] mb-6">
                    Riwayat <span class="text-[#eb7d4d]">Pengembalian</span>
                </h2>

                @forelse ($borrowings_returned as $item)
                    <div class="flex justify-between border-b py-4">
                        <div>
                            <h3 class="font-semibold text-[#265949]">
                                {{ $item->book->judul }}
                            </h3>
                            <p class="text-sm text-gray-500">
                                Dikembalikan: {{ $item->tanggal_kembali_aktual }}
                            </p>
                        </div>

                        <span class="px-4 py-1 bg-green-100 text-green-600 rounded-full text-sm">
                            Selesai
                        </span>
                    </div>
                @empty
                    <p class="text-gray-500">Belum ada pengembalian.</p>
                @endforelse
            </div>

            {{-- PENGATURAN --}}
            <div id="pengaturan" class="tab-content hidden">
                <h2 class="text-2xl font-bold text-[#265949] mb-6">
                    Pengaturan <span class="text-[#eb7d4d]">Profile</span>
                </h2>

                <form method="POST" action="" enctype="multipart/form-data"
                      class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @csrf
                    @method('PUT')

                    <input type="text" name="nama" value="{{ $user->nama }}" class="input">
                    <input type="text" name="no_hp" value="{{ $user->no_hp }}" class="input">
                    <input type="text" name="alamat" value="{{ $user->alamat }}" class="input">
                    <input type="file" name="img_profile" class="input">

                    <div class="md:col-span-2">
                        <button class="px-10 py-3 bg-[#eb7d4d] text-white font-bold rounded-full
                                       hover:-translate-y-1 transition">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

{{-- SIMPLE TAB SCRIPT --}}
<script>
    const tabs = document.querySelectorAll('.tab-btn');
    const contents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            contents.forEach(c => c.classList.add('hidden'));

            tab.classList.add('active');
            document.getElementById(tab.dataset.tab).classList.remove('hidden');
        });
    });
</script>

{{-- STYLE --}}
<style>
    .tab-btn {
        padding: 10px 20px;
        border-radius: 999px;
        background: #ede5d1;
        color: #265949;
        font-weight: 600;
        transition: .3s;
    }
    .tab-btn.active {
        background: #eb7d4d;
        color: white;
    }
    .input {
        padding: 12px;
        border-radius: 12px;
        border: 1px solid #ddd;
        width: 100%;
    }
</style>

@endsection
