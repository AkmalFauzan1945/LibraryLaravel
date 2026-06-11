<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-700">Daftar Koleksi Buku</h3>

                    <a href="{{ route('buku.create') }}"
                        class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2 rounded shadow transition duration-150 ease-in-out">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        Tambah Buku
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-300 text-left text-sm font-semibold text-gray-700">
                                <th class="px-4 py-3 border-b border-gray-200 w-12 text-center">No</th>
                                <th class="px-4 py-3 border-b border-gray-200">Judul Buku</th>
                                <th class="px-4 py-3 border-b border-gray-200">Kategori</th>
                                <th class="px-4 py-3 border-b border-gray-200">Media</th>
                                <th class="px-4 py-3 border-b border-gray-200">Pengarang</th>
                                <th class="px-4 py-3 border-b border-gray-200">Penerbit</th>
                                <th class="px-4 py-3 border-b border-gray-200 text-center">Tahun</th>
                                <th class="px-4 py-3 border-b border-gray-200 text-center">Status</th>
                                <th class="px-4 py-3 border-b border-gray-200 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-600">
                            @forelse($data_buku as $key => $buku)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-4 border-b border-gray-200 text-center font-medium">{{ $key + 1 }}</td>
                                <td class="px-4 py-4 border-b border-gray-200 font-semibold text-gray-800">{{ $buku->judul }}</td>
                                <td class="px-4 py-4 border-b border-gray-200">
                                    <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">
                                        {{ $buku->jenis_koleksi }}
                                    </span>
                                </td>
                                <td class="px-4 py-4 border-b border-gray-200">{{ $buku->media }}</td>
                                <td class="px-4 py-4 border-b border-gray-200">{{ $buku->pengarang }}</td>
                                <td class="px-4 py-4 border-b border-gray-200">{{ $buku->penerbit }}</td>
                                <td class="px-4 py-4 border-b border-gray-200 text-center">{{ $buku->tahun }}</td>
                                <td class="px-4 py-4 border-b border-gray-200 text-center">
                                    @if(strtolower($buku->status) == 'tersedia')
                                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">
                                        Tersedia
                                    </span>
                                    @else
                                    <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded">
                                        {{ $buku->status }}
                                    </span>
                                    @endif
                                </td>
                                <td class="px-4 py-4 border-b border-gray-200 text-center">
                                    <form action="{{ route('buku.destroy', $buku) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center bg-red-600 hover:bg-red-700 text-white text-xs font-semibold px-3 py-1.5 rounded shadow transition duration-150">
                                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9"
                                    class="px-4 py-6 border-b border-gray-200 text-center text-gray-400 italic">
                                    Belum ada data buku di dalam database.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>