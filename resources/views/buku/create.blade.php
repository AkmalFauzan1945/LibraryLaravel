<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Buku Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="flex justify-between items-center mb-6 border-b pb-4">
                    <h3 class="text-lg font-bold text-gray-700">Form Input Data Buku</h3>
                    <a href="{{ route('buku.index') }}" class="inline-flex items-center text-sm bg-gray-500 hover:bg-gray-600 text-white px-3 py-1.5 rounded shadow transition duration-150">
                        Kembali
                    </a>
                </div>

                <form action="{{ route('buku.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Judul Buku</label>
                        <input type="text" name="judul" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Masukkan judul lengkap buku" required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Kategori Buku</label>
                            <select name="jenis_koleksi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($pilihan_kategori as $kat)
                                    <option value="{{ $kat->nama_kategori ?? $kat->kategori }}">
                                        {{ $kat->nama_kategori ?? $kat->kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Media</label>
                            <select name="media" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                                <option value="">-- Pilih Media --</option>
                                <option value="digital">Digital (E-Book)</option>
                                <option value="cetak">Cetak (Fisik)</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Pengarang</label>
                            <input type="text" name="pengarang" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Nama penulis / pengarang" required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Penerbit</label>
                            <input type="text" name="penerbit" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Nama perusahaan penerbit" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Tahun Terbit</label>
                            <input type="number" name="tahun" min="1900" max="2030" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" placeholder="Contoh: 2026" required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Status</label>
                            <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                                <option value="tersedia">Tersedia</option>
                                <option value="dipinjam">Dipinjam</option>
                                <option value="hilang">Hilang</option>
                            </select>
                        </div>
                    </div>

                    <div class="pt-4 border-t flex justify-end">
                        <button type="submit" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2.5 rounded shadow transition duration-150 text-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Simpan Data Buku
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>