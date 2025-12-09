<x-app-layout>
    <div class="p-6">

    <a href="{{ route('admin.dashboard') }}" 
        class="inline-block bg-gray-600 text-white px-4 py-2 rounded mb-4 hover:bg-gray-700">
        ← Back
    </a>

        <h1 class="text-2xl font-bold mb-4">Daftar Spot Mancing</h1>

        @if(session('success'))
            <div class="bg-green-200 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- FORM SEARCH --}}
        <form method="GET" action="{{ route('spots.index') }}" class="mb-6 flex gap-2">
            <input 
                type="text" 
                name="search" 
                placeholder="Cari spot berdasarkan nama, alamat, atau jenis ikan..."
                value="{{ request('search') }}"
                class="border px-3 py-2 rounded w-1/2"
            >
            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Cari
            </button>

            <a href="{{ route('spots.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded">
                Reset
            </a>
        </form>

        {{-- TABEL DATA --}}
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200 text-center">
                    <th class="border px-2 py-1">Foto</th>
                    <th class="border px-2 py-1">Nama Spot</th>
                    <th class="border px-2 py-1">Alamat</th>
                    <th class="border px-2 py-1">Jenis Ikan</th>
                    <th class="border px-2 py-1 w-40">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($spots as $spot)
                    <tr>
                        {{-- FOTO --}}
                        <td class="border px-2 py-1">
    @if($spot->foto)
        <img 
            src="{{ asset('storage/' . $spot->foto) }}" 
            class="w-24 h-20 object-cover rounded border"
        >
    @else
        <span class="text-gray-400 text-sm">Tidak ada foto</span>
    @endif
</td>


                        {{-- DATA --}}
                        <td class="border px-2 py-1">{{ $spot->nama_spot }}</td>
                        <td class="border px-2 py-1">{{ $spot->alamat }}</td>
                        <td class="border px-2 py-1">{{ $spot->jenis_ikan }}</td>

                        {{-- AKSI --}}
                        <td class="border px-2 py-1">
                            <div class="flex gap-2 justify-center">

                                {{-- Detail --}}
                                <a href="{{ route('spots.show', $spot->id) }}"
                                   class="bg-blue-500 text-white px-3 py-1 rounded text-sm">
                                    Detail
                                </a>

                                {{-- Edit --}}
                                <a href="{{ route('spots.edit', $spot->id) }}"
                                   class="bg-yellow-500 text-white px-3 py-1 rounded text-sm">
                                    Edit
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('spots.destroy', $spot->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus spot ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white px-3 py-1 rounded text-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-gray-500 py-4">
                            Tidak ada data ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
