@extends('layouts.index')

@section('content')

{{-- PROFILE HEADER --}}
<section class="w-full  pb-20 pt-[160px] bg-cover bg-center drop-shadow-soft-green" @if($user->bg_img) style="background-image: url({{ asset('img_member_upload/'. $user->bg_img) }})" @elseif($user->bg_img == null) style="background-image: url({{ asset('img/bg-cta2.png') }})" @endif >
    <div class=" relative max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-10 px-10">

        {{-- AVATAR --}}
        <div class="relative">
            <img
                src="{{ asset('img_member_upload/'.$user->img_profile) }}"
                onerror="this.onerror=null;this.src='{{ asset('img_member_upload/no_img.png') }}'"
                class="w-40 h-40 object-cover rounded-full border-4 border-[#eb7d4d]"
                alt=""
            >
        </div>

        {{-- USER INFO --}}
        <div class="text-white flex flex-col gap-4">
            <h1 class="text-5xl font-bold text-[#eb7d4d]">
                {{ $user->nama }}
            </h1>

            <p class="text-[#fff] text-md bg-[#ede5d1]/60 px-4 py-2 rounded-full w-fit font-semibold">
                No Anggota: <span class="font-semibold">{{ $user->id }}</span>
            </p>

            <p class="text-sm font-semibold text-[#1a1a1a]">
                📍 {{ $user->alamat }}
            </p>

            <p class="text-sm font-semibold text-[#1a1a1a]">
                📞 {{ $user->no_hp }}
            </p>
        </div>
        <div class="absolute top-0 right-0">
            <form action="{{ route('edit_bg') }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PUT')
                <input type="file" id="bg_img" name="bg_img" class="hidden" accept="image/*" onchange="validateBgImage(this)">

                <button type="button" onclick="document.getElementById('bg_img').click()" class="px-6 py-4 bg-[#eb7d4d] text-white font-bold rounded-full hover:-translate-y-1 transition">edit background</button>
            </form>
        </div>
    </div>
</section>

{{-- MAIN SECTION --}}
<section class="w-full px-20 py-24 bg-[#ede5d1]/50">
    <div class="max-w-6xl mx-auto">

        {{-- TAB MENU --}}
        <div class="flex flex-wrap gap-6 mb-12">
            <button class="tab-btn active" data-tab="dipinjam">Sedang Dipinjam</button>
            <button class="tab-btn" data-tab="pending">Ditunggu</button>
            <button class="tab-btn" data-tab="kembali">Pengembalian</button>
            <button class="tab-btn" data-tab="pengaturan">Pengaturan</button>
        </div>

        {{-- TAB CONTENT --}}
        <div class="bg-white rounded-2xl shadow-soft-green p-10">
            
            <div id="pending" class="tab-content hidden">
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

                        <span class="px-4 py-3 rounded-full bg-yellow-100 text-yellow-600 text-sm">
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

                        <span class="px-4 py-3 bg-green-100 text-green-600 rounded-full text-sm">
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

                <form method="POST" action="{{ route('profiles.update', $user->id) }}" enctype="multipart/form-data"
                      class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @csrf
                    @method('PUT')

                    <div class="">
                        <input type="text" name="nama" value="{{ $user->nama }}" class="input" placeholder="masukkan nama kamu...">
                        @error('nama')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="">
                        <input type="number" name="no_hp" value="{{ $user->no_hp }}" class="input" placeholder="masukkan No Telp kamu...">
                        @error('no_hp')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="">
                        <input type="text" name="alamat" value="{{ $user->alamat }}" class="input" placeholder="masukkan Alamat kamu...">
                        @error('alamat')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="">
                        <input type="file" name="img_profile" class="input">
                        @error('img_profile')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                        <img src="{{ asset('img_member_upload/'.$user->img_profile) }}" alt="" class="w-32 h-32 object-cover object-center mt-2" onerror="this.onerror=null;this.src='{{ asset('img_member_upload/no_img.png') }}'">
                    </div>
                    <div class="md:col-span-2">
                        <button type="submit" class="px-10 py-3 bg-[#eb7d4d] text-white font-bold rounded-full
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

    function validateBgImage(input) {
    const file = input.files[0];
    if (!file) return;

    const maxSize = 2 * 1024 * 1024; // 2MB

    if (file.size > maxSize) {
        alert('Ukuran gambar terlalu besar! Maksimal 2 MB.');
        input.value = ''; // reset file input
        return;
    }

    // kalau lolos, submit otomatis
    input.form.submit();
}
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
