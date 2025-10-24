<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900">
            {{ $produk->nama_buku }}
        </h2>
    </x-slot>

    <!-- Redesigned product detail page with minimalist styling -->
    <div class="p-8">
        <div class="max-w-4xl mx-auto bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-8">
                <!-- Book Image -->
                <div class="flex items-center justify-center">
                    @if($produk->gambar)
                        <img class="w-full h-auto max-h-96 object-cover rounded-lg border border-gray-200"
                             src="{{ asset('storage/' . $produk->gambar) }}"
                             alt="{{ $produk->nama_buku }}">
                    @else
                        <div class="w-full h-96 flex items-center justify-center bg-gray-100 rounded-lg border border-gray-200">
                            <div class="text-center">
                                <svg class="w-16 h-16 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C6.5 6.253 2 10.998 2 17s4.5 10.747 10 10.747c5.5 0 10-4.998 10-10.747S17.5 6.253 12 6.253z"></path>
                                </svg>
                                <p class="text-gray-500">No image available</p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Book Details -->
                <div class="flex flex-col justify-between space-y-6">
                    <!-- Info Section -->
                    <div class="space-y-4">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Category</p>
                            <p class="text-lg text-gray-900 font-semibold">{{ $produk->kategori }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-600">Stock Available</p>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="text-2xl font-bold text-gray-900">{{ $produk->jumlah }}</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $produk->jumlah > 0 ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700' }}">
                                    {{ $produk->jumlah > 0 ? 'Available' : 'Out of Stock' }}
                                </span>
                            </div>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-gray-600">Description</p>
                            <p class="text-gray-700 mt-2 leading-relaxed">{{ $produk->deskripsi }}</p>
                        </div>
                    </div>

                    <!-- Borrow Form -->
                    @if($produk->jumlah > 0)
                    <form action="{{ route('produk.pinjam', $produk->id) }}" method="POST" class="space-y-4 pt-6 border-t border-gray-200">
                        @csrf

                        <div class="space-y-2">
                            <label for="jumlah_pinjam" class="block text-sm font-medium text-gray-900">Quantity to Borrow</label>
                            <input type="number" name="jumlah_pinjam" id="jumlah_pinjam"
                                min="1" max="{{ $produk->jumlah }}"
                                value="1"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                        </div>

                        <button type="submit"
                            class="w-full px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors">
                            Borrow This Book
                        </button>
                    </form>
                    @else
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4 text-center">
                        <p class="text-red-700 font-medium">This book is currently out of stock</p>
                    </div>
                    @endif

                    <!-- Messages -->
                    @if (session('error'))
                        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
