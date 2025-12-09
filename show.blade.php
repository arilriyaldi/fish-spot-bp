<x-app-layout>
    <div class="max-w-3xl mx-auto p-6">

        <h1 class="text-3xl font-bold mb-6">Detail Spot Mancing</h1>

        {{-- Foto --}}
        @if($spot->foto)
            <img src="{{ asset('storage/' . $spot->foto) }}" 
                 class="w-full h-64 object-cover rounded mb-6 shadow">
        @else
            <div class="w-full h-64 bg-gray-300 flex items-center justify-center rounded mb-6">
                <span class="text-gray-600">Tidak ada foto</span>
            </div>
        @endif

        {{-- Detail Spot --}}
        <div class="bg-white shadow rounded p-6">
            <p><strong>Nama Spot:</strong> {{ $spot->nama_spot }}</p>
            <p class="mt-2"><strong>Alamat:</strong> {{ $spot->alamat }}</p>
            <p class="mt-2"><strong>Deskripsi:</strong><br> {{ $spot->deskripsi }}</p>
            <p class="mt-2"><strong>Jenis Ikan:</strong> {{ $spot->jenis_ikan }}</p>

            <p class="mt-2"><strong>Latitude:</strong> {{ $spot->latitude }}</p>
            <p class="mt-2"><strong>Longitude:</strong> {{ $spot->longitude }}</p>
        </div>

        {{-- GOOGLE MAPS --}}
        <div class="mt-8">
            <h2 class="text-2xl font-semibold mb-3">Lokasi di Google Maps</h2>

            @if($spot->latitude && $spot->longitude)
                <iframe
                    width="100%"
                    height="350"
                    frameborder="0"
                    style="border:0; border-radius: 8px;"
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps?q={{ $spot->latitude }},{{ $spot->longitude }}&z=15&output=embed">
                </iframe>
            @else
                <p class="text-gray-500">Lokasi tidak tersedia.</p>
            @endif
        </div>

        {{-- Tombol Kembali --}}
        <a href="{{ route('spots.index') }}" 
           class="mt-6 inline-block bg-gray-700 text-white px-4 py-2 rounded">
            ← Kembali ke Daftar Spot
        </a>

    </div>
</x-app-layout>
