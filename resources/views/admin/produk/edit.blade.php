<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900">
            Edit Book
        </h2>
    </x-slot>

    <!-- Redesigned edit product form with minimalist styling -->
    <div class="p-8">
        <div class="max-w-2xl mx-auto bg-white rounded-xl border border-gray-200 shadow-sm p-8">
            <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Book Title -->
                <div class="space-y-2">
                    <label for="nama_buku" class="block text-sm font-medium text-gray-900">Book Title</label>
                    <input type="text" name="nama_buku" id="nama_buku"
                        value="{{ old('nama_buku', $produk->nama_buku) }}"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        required>
                    @error('nama_buku')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div class="space-y-2">
                    <label for="kategori" class="block text-sm font-medium text-gray-900">Category</label>
                    <input type="text" name="kategori" id="kategori"
                        value="{{ old('kategori', $produk->kategori) }}"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        required>
                    @error('kategori')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Stock Quantity -->
                <div class="space-y-2">
                    <label for="jumlah" class="block text-sm font-medium text-gray-900">Stock Quantity</label>
                    <input type="number" name="jumlah" id="jumlah"
                        value="{{ old('jumlah', $produk->jumlah) }}"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        required>
                    @error('jumlah')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Book Image -->
                <div class="space-y-2">
                    <label for="gambar" class="block text-sm font-medium text-gray-900">Book Cover Image</label>
                    <input type="file" name="gambar" id="gambar"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        accept="image/*">
                    <p class="text-xs text-gray-600">Leave empty to keep current image</p>

                    @if ($produk->gambar)
                        <div class="mt-3 space-y-2">
                            <p class="text-sm font-medium text-gray-900">Current Image:</p>
                            <img src="{{ asset('storage/' . $produk->gambar) }}"
                                 alt="Book Cover"
                                 class="w-32 h-40 object-cover rounded-lg border border-gray-200">
                        </div>
                    @endif
                    @error('gambar')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="space-y-2">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-900">Description</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        required>{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                    <a href="{{ route('produk.index') }}"
                       class="px-4 py-2 text-gray-700 font-medium rounded-lg hover:bg-gray-100 transition-colors">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors">
                        Update Book
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
