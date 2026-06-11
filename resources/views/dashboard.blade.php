<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>Selamat Datang, {{ Auth::user()->name }}</div>
                   <div class="font-medium text-sm text-gray-500">Akun Saat Ini : {{ \Illuminate\Support\Str::mask(Auth::user()->email, '/', 3, 6) }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
