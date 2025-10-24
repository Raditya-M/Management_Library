<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            {{ __('Daftar Pesanan') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Redesigned container with modern white-mode styling -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                @if($pesanan->isEmpty())
                    <!-- Empty state with centered message -->
                    <div class="flex items-center justify-center py-16 px-6">
                        <div class="text-center">
                            <p class="text-gray-500 text-base">Belum ada pesanan masuk.</p>
                        </div>
                    </div>
                @else
                    <!-- Modern table with clean styling and proper spacing -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-200 bg-gray-50">
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">No</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Nama Peminjam</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Produk</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Gambar</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Jumlah</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Status</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($pesanan as $i => $p)
                                    <!-- Table rows with hover effect and proper alignment -->
                                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $i+1 }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $p->user->name ?? '-' }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $p->produk->nama_buku ?? '-' }}</td>
                                        <td class="px-6 py-4">
                                            <img class="w-12 h-12 object-cover rounded-lg border border-gray-200" 
                                                 src="{{ asset('./storage/'.$p->produk->gambar) }}" 
                                                 alt="{{ $p->produk->nama_buku ?? 'Produk' }}" />
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $p->jumlah }}</td>
                                        <td class="px-6 py-4">
                                            <!-- Modern status badges with LibraFlow color scheme -->
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                                {{ $p->status == 'dipinjam' ? 'bg-yellow-100 text-yellow-800' : 
                                                   ($p->status == 'dikembalikan' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800') }}">
                                                {{ ucfirst($p->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('pesanan.show', $p->id) }}" 
                                               class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-600 hover:bg-blue-50 rounded-lg transition-colors duration-150">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
