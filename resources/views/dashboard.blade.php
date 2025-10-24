<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900">
            Dashboard
        </h2>
    </x-slot>

    <!-- Redesigned dashboard with minimalist white-mode aesthetic -->
    <div class="p-8 space-y-8">
        <!-- Welcome Section -->
        <div class="space-y-2">
            <p class="text-gray-600">Welcome back,</p>
            <h1 class="text-3xl font-bold text-gray-900">{{ Auth::user()->name }}</h1>
        </div>

        @if (session('error'))
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">
            {{ session('error') }}
        </div>
        @endif

        <!-- Summary Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Total Books Card -->
            <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm hover:shadow-md transition-all duration-200">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Books</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $produk->count() ?? 0 }}</p>
                    </div>
                    <div class="bg-blue-50 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C6.5 6.253 2 10.998 2 17s4.5 10.747 10 10.747c5.5 0 10-4.998 10-10.747S17.5 6.253 12 6.253z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Borrowed Books Card -->
            <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm hover:shadow-md transition-all duration-200">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Borrowed</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $produk->sum('jumlah') ?? 0 }}</p>
                    </div>
                    <div class="bg-yellow-50 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Active Users Card -->
            <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm hover:shadow-md transition-all duration-200">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Active Users</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $produk->count() ?? 0 }}</p>
                    </div>
                    <div class="bg-green-50 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0zM6 20h12a6 6 0 00-6-6 6 6 0 00-6 6z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Books Grid -->
        <div class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900">Available Books</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($produk as $p)
                    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition-all duration-200">
                        <!-- Book Image -->
                        <div class="w-full h-48 bg-gray-100 overflow-hidden">
                            @if($p->gambar)
                                <img class="w-full h-full object-cover" src="{{ asset('storage/' . $p->gambar) }}" alt="{{ $p->nama_buku }}">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C6.5 6.253 2 10.998 2 17s4.5 10.747 10 10.747c5.5 0 10-4.998 10-10.747S17.5 6.253 12 6.253z"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- Book Info -->
                        <div class="p-5 space-y-3">
                            <h5 class="font-semibold text-gray-900 line-clamp-2">{{ $p->nama_buku }}</h5>
                            
                            <div class="space-y-1 text-sm">
                                <p class="text-gray-600"><span class="font-medium text-gray-700">Category:</span> {{ $p->kategori ?? '-' }}</p>
                                <p class="text-gray-600"><span class="font-medium text-gray-700">Stock:</span> {{ $p->jumlah }}</p>
                            </div>

                            <p class="text-sm text-gray-600 line-clamp-2">{{ $p->deskripsi ?? 'No description available.' }}</p>

                            <a href="{{ route('produk.show', $p->id) }}" 
                               class="inline-flex items-center justify-center w-full px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                View Details
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500 font-medium">No books available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
