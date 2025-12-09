<x-app-layout>
    <div class="max-w-4xl mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6">Tambah Spot Mancing</h1>

        <form action="{{ route('spots.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block font-medium">Foto Spot</label>
                <input type="file" name="foto" class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block font-medium">Nama Spot</label>
                <input type="text" name="nama_spot" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Deskripsi</label>
                <textarea name="deskripsi" class="w-full border rounded px-3 py-2"></textarea>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Alamat</label>
                <input type="text" name="alamat" class="w-full border rounded px-3 py-2">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium">Latitude</label>
                    <input type="text" name="latitude" class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block font-medium">Longitude</label>
                    <input type="text" name="longitude" class="w-full border rounded px-3 py-2">
                </div>
            </div>

            <div class="mb-4 mt-4">
                <label class="block font-medium">Jenis Ikan</label>
                <input type="text" name="jenis_ikan" class="w-full border rounded px-3 py-2">
            </div>

            <button class="bg-blue-600 text-white px-5 py-2 rounded mt-4">Simpan</button>
        </form>
    </div>
</x-app-layout>
