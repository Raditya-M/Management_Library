<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            {{ __('Riwayat Pembelian') }}
        </h2>
    </x-slot>

    <div class="py-8 px-8">
        <!-- Redesigned to minimalist white-mode with clean cards and proper spacing -->
        @forelse ($riwayat as $item)
            <div class="bg-white rounded-xl border border-gray-200 p-6 mb-4 shadow-sm hover:shadow-md transition-all duration-200">
                <div class="flex items-start gap-6">
                    <!-- Product Image -->
                    <img src="{{ asset('storage/' . $item->produk->gambar) }}" 
                         alt="{{ $item->produk->nama }}" 
                         class="w-28 h-28 object-cover rounded-lg border border-gray-200 flex-shrink-0">
                    
                    <!-- Product Details -->
                    <div class="flex-1">
                        <h3 class="text-gray-900 text-lg font-semibold mb-2">{{ $item->produk->nama }}</h3>
                        
                        <div class="space-y-2 mb-4">
                            <p class="text-gray-600 text-sm">
                                <span class="font-medium text-gray-700">Jumlah:</span> {{ $item->jumlah }}
                            </p>
                            <p class="text-gray-600 text-sm">
                                <span class="font-medium text-gray-700">Tanggal:</span> {{ $item->created_at->format('d M Y H:i') }}
                            </p>
                        </div>

                        <!-- Status Badge -->
                        <div class="flex items-center gap-2">
                            <span class="text-gray-600 text-sm font-medium">Status:</span>
                            @if ($item->status == 'pending')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-50 text-yellow-700 border border-yellow-200">
                                    Pending
                                </span>
                            @elseif ($item->status == 'completed')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-50 text-green-700 border border-green-200">
                                    Selesai
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-50 text-gray-700 border border-gray-200">
                                    {{ ucfirst($item->status) }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <!-- Redesigned empty state with minimalist styling -->
            <div class="flex flex-col items-center justify-center py-16">
                <div class="text-center">
                    <p class="text-gray-400 text-lg mb-2">Belum ada pembelian</p>
                    <p class="text-gray-300 text-sm">Mulai berbelanja untuk melihat riwayat pembelian Anda di sini</p>
                </div>
            </div>
        @endforelse
    </div>
</x-app-layout>
