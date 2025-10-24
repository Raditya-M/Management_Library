<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Detail Pesanan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-white mb-4">Informasi Pesanan</h3>

                @if (session('success'))
                    <div class="mb-4 bg-green-600 text-white px-4 py-2 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('pesanan.updateStatus', $pesanan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <table class="w-full text-gray-300">
                        <tr>
                            <td class="py-2 font-medium">Nama Pembeli</td>
                            <td>: {{ $pesanan->user->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 font-medium">Produk</td>
                            <td>: {{ $pesanan->produk->nama ?? 'Tidak ada data' }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 font-medium">Jumlah</td>
                            <td>: {{ $pesanan->jumlah }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 font-medium">Status</td>
                            <td>
                                <span class="px-3 py-1 rounded text-sm 
                                    {{ $pesanan->status == 'dipinjam' ? 'bg-yellow-500 text-black' : 'bg-green-500 text-white' }}">
                                    {{ ucfirst($pesanan->status) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 font-medium">Tanggal Pesanan</td>
                            <td>: {{ $pesanan->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 font-medium">Status Pengantaran</td>
                            <td class="text-gray-800">
                                <select name="status" id="status" required class="rounded px-2 py-1">
                                    <option value="dipinjam" {{ old('status', $pesanan->status) == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                                    <option value="dikembalikan" {{ old('status', $pesanan->status) == 'dikembalikan' ? 'selected' : '' }}>dikembalikan</option>
                                    <option value="ditolak" {{ old('status', $pesanan->status) == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                </select>
                            </td>
                        </tr>
                    </table>

                    <div class="mt-6 flex justify-between">
                        <a href="{{ route('pesanan.index') }}" 
                            class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600">
                            Kembali
                        </a>
                        <button type="submit" 
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
