<x-app-layout>
    <div class="max-w-6xl mx-auto p-6">

        {{-- JUDUL --}}
        <h1 class="text-3xl font-bold mb-6">Spot Mancing Tersedia</h1>

        {{-- FORM PENCARIAN --}}
        <form action="{{ route('user.spots') }}" method="GET" class="mb-6">
            <input 
                type="text" 
                name="search" 
                value="{{ $search ?? '' }}" 
                placeholder="Cari spot berdasarkan nama, alamat, atau jenis ikan..."
                class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-300"
            >
        </form>

        {{-- Jika tidak ada data --}}
        @if($spots->isEmpty())
            <p class="text-gray-600">Tidak ada spot yang cocok dengan pencarian.</p>
        @endif

        {{-- LIST SPOT --}}
        <div class="grid md:grid-cols-3 gap-6">

            @foreach ($spots as $spot)
    <a href="{{ route('user.spots.detail', $spot->id) }}"
       class="block bg-white shadow rounded-lg overflow-hidden hover:shadow-xl transition">

        {{-- FOTO --}}
        @if($spot->foto)
            <img src="{{ asset('storage/' . $spot->foto) }}"
                 class="w-full h-48 object-cover">
        @else
            <div class="w-full h-48 bg-gray-300 flex items-center justify-center">
                <span class="text-gray-600">Tidak ada foto</span>
            </div>
        @endif

        {{-- INFORMASI --}}
        <div class="p-4">
            <h2 class="font-bold text-xl mb-2">{{ $spot->nama_spot }}</h2>

            <p class="text-gray-700 text-sm">
                <strong>Alamat:</strong> {{ $spot->alamat }}
            </p>

            <p class="mt-2 text-gray-700 text-sm">
                <strong>Jenis Ikan:</strong> {{ $spot->jenis_ikan }}
            </p>

            <p class="mt-2 text-gray-700 text-sm">
                <strong>Deskripsi:</strong><br>
                {{ $spot->deskripsi }}
            </p>
        </div>

    </a>
@endforeach

        </div>
    </div>
</x-app-layout>
