<x-app-layout>
    <div class="p-6">
        <h1 class="text-3xl font-bold mb-6">Dashboard Admin</h1>

        {{-- STATISTIC CARDS --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            
            {{-- Total Spot --}}
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-gray-500 text-sm uppercase">Total Spot</h2>
                <p class="text-4xl font-bold mt-2">{{ $totalSpot }}</p>
            </div>

            {{-- Total Jenis Ikan --}}
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-gray-500 text-sm uppercase">Jenis Ikan Tersedia</h2>
                <p class="text-4xl font-bold mt-2">{{ $totalJenisIkan }}</p>
            </div>

            {{-- Total User --}}
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-gray-500 text-sm uppercase">Total User Terdaftar</h2>
                <p class="text-4xl font-bold mt-2">{{ $totalUser }}</p>
            </div>

        </div>

        {{-- MENU AKSI --}}
        <div class="mt-8">
            <h2 class="text-xl font-semibold mb-4">Menu Cepat</h2>

            <div class="flex gap-4">

                <a href="{{ route('spots.index') }}"
                    class="bg-blue-600 text-white px-5 py-3 rounded shadow hover:bg-blue-700">
                    Kelola Spot Mancing
                </a>

                <a href="{{ route('spots.create') }}"
                    class="bg-green-600 text-white px-5 py-3 rounded shadow hover:bg-green-700">
                    Tambah Spot Baru
                </a>

                {{-- TOMBOL BARU: TAMPILAN USER --}}
                <a href="{{ url('/user/spots') }}"
                    class="bg-purple-600 text-white px-5 py-3 rounded shadow hover:bg-purple-700">
                    Tampilan User
                </a>

            </div>
        </div>

    </div>
</x-app-layout>
