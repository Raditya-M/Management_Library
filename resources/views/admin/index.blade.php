<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900">
            Manage Books
        </h2>
    </x-slot>

    <!-- Redesigned admin books page with minimalist white-mode aesthetic -->
    <div class="p-8 space-y-6">
        <!-- Header with Add Button -->
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-xl font-semibold text-gray-900">Books Library</h3>
                <p class="text-sm text-gray-600 mt-1">Manage all books in your library</p>
            </div>
            <a href="{{ route('produk.create') }}" 
               class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add Book
            </a>
        </div>

        <!-- Books Table -->
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-gray-200 bg-gray-50">
                            <th class="px-6 py-3 text-left font-semibold text-gray-900">No</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-900">Book Title</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-900">Category</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-900">Stock</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-900">Image</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-900">Description</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-900">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($produk as $p)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-gray-900 font-medium">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-gray-900 font-medium">{{ $p->nama_buku }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $p->kategori }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700">
                                    {{ $p->jumlah }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @if($p->gambar)
                                    <img src="{{ asset('storage/' . $p->gambar) }}" 
                                         class="w-10 h-10 object-cover rounded-lg border border-gray-200">
                                @else
                                    <span class="text-gray-400 text-xs">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-600 max-w-xs truncate">{{ $p->deskripsi }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('produk.edit', $p->id) }}" 
                                       class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors">
                                        Edit
                                    </a>
                                    <form action="{{ route('produk.destroy', $p->id) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Are you sure you want to delete this book?');"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition-colors">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                <p class="font-medium">No books available.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
