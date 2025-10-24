<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Form Edit Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-lg mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">

            {{-- Gambar Buku --}}
            <div class="flex justify-center mb-6">
                <img src="{{ asset('storage/' . $produk->gambar) }}" 
                     alt="{{ $produk->nama_buku }}" 
                     class="w-64 h-64 object-cover rounded-lg border">
            </div>

            {{-- Form Edit Buku --}}
            <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Nama Buku --}}
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 font-bold">Nama Buku</label>
                    <input type="text" name="nama_buku" required value="{{ old('nama_buku', $produk->nama_buku) }}"
                        class="w-full mt-2 p-2 border rounded-md dark:bg-gray-700 dark:text-white"
                        placeholder="Masukkan nama buku">
                </div>

                {{-- Kategori --}}
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 font-bold">Kategori</label>
                    <input type="text" name="kategori" required value="{{ old('kategori', $produk->kategori) }}"
                        class="w-full mt-2 p-2 border rounded-md dark:bg-gray-700 dark:text-white"
                        placeholder="Masukkan kategori buku">
                </div>

                {{-- Jumlah --}}
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 font-bold">Jumlah</label>
                    <input type="number" name="jumlah" min="1" required value="{{ old('jumlah', $produk->jumlah) }}"
                        class="w-full mt-2 p-2 border rounded-md dark:bg-gray-700 dark:text-white"
                        placeholder="Masukkan jumlah buku">
                </div>

                {{-- Gambar --}}
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 font-bold">Gambar</label>
                    <input type="file" name="gambar"
                        class="w-full mt-2 p-2 border rounded-md dark:bg-gray-700 dark:text-white">
                    
                    @if ($produk->gambar)
                        <div class="mt-3">
                            <p class="text-sm text-gray-600 mb-1">Gambar saat ini:</p>
                            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Gambar Buku" 
                                 class="w-24 h-24 object-cover rounded-md border">
                        </div>
                    @endif
                </div>

                {{-- Deskripsi --}}
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 font-bold">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" required
                        class="w-full mt-2 p-2 border rounded-md dark:bg-gray-700 dark:text-white"
                        placeholder="Masukkan deskripsi buku">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                </div>

                {{-- Tombol --}}
                <div class="flex justify-between">
                    <a href="{{ route('produk.index') }}"
                       class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Batal</a>

                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
