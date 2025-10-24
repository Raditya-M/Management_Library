<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900">
            Add New Book
        </h2>
    </x-slot>

    <!-- Redesigned create product form with minimalist styling -->
    <div class="p-8">
        <div class="max-w-2xl mx-auto bg-white rounded-xl border border-gray-200 shadow-sm p-8">
            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Book Title -->
                <div class="space-y-2">
                    <label for="nama_buku" class="block text-sm font-medium text-gray-900">Book Title</label>
                    <input name="nama_buku" type="text" id="nama_buku"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        placeholder="Enter book title"
                        value="{{ old('nama_buku') }}" required>
                    @error('nama_buku')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div class="space-y-2">
                    <label for="kategori" class="block text-sm font-medium text-gray-900">Category</label>
                    <input name="kategori" type="text" id="kategori"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        placeholder="Enter category"
                        value="{{ old('kategori') }}" required>
                    @error('kategori')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Stock Quantity -->
                <div class="space-y-2">
                    <label for="jumlah" class="block text-sm font-medium text-gray-900">Stock Quantity</label>
                    <input name="jumlah" type="number" id="jumlah"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        placeholder="Enter quantity"
                        value="{{ old('jumlah') }}" required>
                    @error('jumlah')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Book Image -->
                <div class="space-y-2">
                    <label for="gambar" class="block text-sm font-medium text-gray-900">Book Cover Image</label>
                    <input name="gambar" type="file" id="gambar"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        accept="image/*">
                    <p class="text-xs text-gray-600">Recommended: JPG or PNG, max 2MB</p>
                    @error('gambar')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="space-y-2">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-900">Description</label>
                    <textarea name="deskripsi" id="deskripsi"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        placeholder="Enter book description"
                        rows="4" required>{{ old('deskripsi') }}</textarea>
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
                        Add Book
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
