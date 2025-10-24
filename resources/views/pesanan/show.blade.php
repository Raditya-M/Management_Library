<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            Detail Pesanan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <!-- Updated card styling to white background with subtle border and shadow -->
            <div class="bg-white overflow-hidden rounded-xl border border-gray-200 shadow-sm p-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-6">Informasi Pesanan</h3>

                @if (session('success'))
                    <!-- Updated success message styling with green accent -->
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('pesanan.updateStatus', $pesanan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Redesigned table layout with better spacing and typography -->
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between items-center py-3 border-b border-gray-100">
                            <span class="text-gray-600 font-medium">Nama Pembeli</span>
                            <span class="text-gray-900">{{ $pesanan->user->name ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between items-center py-3 border-b border-gray-100">
                            <span class="text-gray-600 font-medium">Produk</span>
                            <span class="text-gray-900">{{ $pesanan->produk->nama ?? 'Tidak ada data' }}</span>
                        </div>
                        <div class="flex justify-between items-center py-3 border-b border-gray-100">
                            <span class="text-gray-600 font-medium">Jumlah</span>
                            <span class="text-gray-900">{{ $pesanan->jumlah }}</span>
                        </div>
                        <div class="flex justify-between items-center py-3 border-b border-gray-100">
                            <span class="text-gray-600 font-medium">Status</span>
                            <span class="px-3 py-1 rounded-lg text-sm font-medium
                                {{ $pesanan->status == 'dipinjam' ? 'bg-yellow-50 text-yellow-700' : ($pesanan->status == 'dikembalikan' ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700') }}">
                                {{ ucfirst($pesanan->status) }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center py-3 border-b border-gray-100">
                            <span class="text-gray-600 font-medium">Tanggal Pesanan</span>
                            <span class="text-gray-900">{{ $pesanan->created_at->format('d M Y, H:i') }}</span>
                        </div>
                        <div class="flex justify-between items-center py-3">
                            <span class="text-gray-600 font-medium">Status Pengantaran</span>
                            <!-- Updated select styling with modern appearance -->
                            <select name="status" id="status" required class="rounded-lg px-3 py-2 border border-gray-200 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="dipinjam" {{ old('status', $pesanan->status) == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                                <option value="dikembalikan" {{ old('status', $pesanan->status) == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                                <option value="ditolak" {{ old('status', $pesanan->status) == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>
                    </div>

                    <!-- Updated button styling with modern appearance and proper spacing -->
                    <div class="flex justify-between gap-3">
                        <a href="{{ route('pesanan.index') }}" 
                            class="flex-1 bg-gray-100 text-gray-900 px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors duration-200 text-center font-medium">
                            Kembali
                        </a>
                        <button type="submit" 
                            class="flex-1 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
