<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">

        {{-- FOTO --}}
        <img src="{{ asset('storage/' . $spot->foto) }}" 
             class="w-full h-64 object-cover rounded-xl shadow">

        {{-- NAMA SPOT --}}
        <h1 class="text-3xl font-bold mt-6 text-blue-700">{{ $spot->nama_spot }}</h1>

        <div class="mt-4 space-y-2 text-gray-800">

            <p><strong>Alamat:</strong> {{ $spot->alamat }}</p>

            <p><strong>Jenis Ikan:</strong> {{ $spot->jenis_ikan }}</p>

            <p><strong>Deskripsi:</strong><br>
                {{ $spot->deskripsi ?? 'Tidak ada deskripsi.' }}
            </p>

        </div>

        

        {{-- GOOGLE MAPS --}}
        <div class="mt-8">
            <iframe
                width="100%"
                height="300"
                frameborder="0"
                style="border:0; border-radius: 10px;"
                src="https://www.google.com/maps?q={{ $spot->latitude }},{{ $spot->longitude }}&hl=es;z=14&output=embed">
            </iframe>
        </div>

        {{-- BACK --}}
        <a href="{{ route('user.spots') }}"
            class="inline-block mt-6 text-blue-600 hover:underline">
            ← Kembali ke daftar spot
        </a>
    </div>
</x-app-layout>
