<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Fish Spot BP</title>

    <style>
        /* Tambahan animasi lembut */
        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hover-card:hover {
            transform: translateY(-4px);
            transition: .3s;
        }
    </style>
</head>

<body class="bg-gray-50">

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-4 text-center font-semibold">
            {{ session('success') }}
        </div>
    @endif

    {{-- HERO SECTION --}}
    <div class="min-h-[70vh] flex items-center justify-center bg-gradient-to-br from-blue-700 to-blue-500">

        <div class="text-center text-white px-4 w-full max-w-4xl mx-auto fade-in">

            <h1 class="text-4xl md:text-6xl font-extrabold mb-4 drop-shadow-lg">
                Selamat Datang di Fish Spot BP
            </h1>

            <p class="text-lg md:text-2xl mb-8 text-blue-100">
                Temukan spot memancing terbaik di Bangka & Pangkalpinang  
                lengkap dengan foto, informasi ikan, dan lokasi akurat.
            </p>

            <div class="flex flex-wrap justify-center gap-4 mt-6">

                {{-- Register --}}
                <a href="{{ route('force.register') }}"
                    class="bg-white text-blue-700 font-semibold px-7 py-3 rounded-xl shadow-lg hover:bg-gray-200 transition transform hover:-translate-y-1">
                    📝 Register User
                </a>

                {{-- Login User --}}
                <a href="{{ route('force.login') }}"
                    class="bg-blue-900 hover:bg-blue-950 text-white px-7 py-3 rounded-xl font-semibold shadow-lg transition transform hover:-translate-y-1">
                    🔑 Login User
                </a>

                {{-- Login Admin --}}
                <a href="{{ route('admin.login') }}" 
                    class="bg-red-600 hover:bg-red-700 text-white px-7 py-3 rounded-xl font-semibold shadow-lg transition transform hover:-translate-y-1">
                    🛡️ Login Admin
                </a>
            </div>

        </div>
    </div>

    {{-- SECTION INFORMASI --}}
    <div class="py-20 px-6 max-w-6xl mx-auto text-center">

        <h2 class="text-3xl md:text-4xl font-extrabold mb-12 text-blue-800">
            Kenapa Memilih Fish Spot BP?
        </h2>

        <div class="grid md:grid-cols-3 gap-10">

            <div class="bg-white rounded-2xl shadow-lg p-7 hover-card fade-in">
                <h3 class="text-xl font-semibold mb-3 text-blue-700">🗺️ Peta Interaktif</h3>
                <p class="text-gray-600">Lihat lokasi spot memancing langsung di Google Maps dengan akurat.</p>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-7 hover-card fade-in">
                <h3 class="text-xl font-semibold mb-3 text-blue-700">🎣 Informasi Lengkap</h3>
                <p class="text-gray-600">Foto, jenis ikan, alamat, dan detail lengkap langsung dari pemancing.</p>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-7 hover-card fade-in">
                <h3 class="text-xl font-semibold mb-3 text-blue-700">🔍 Pencarian Spot</h3>
                <p class="text-gray-600">Cari spot berdasarkan nama, alamat, atau jenis ikan secara instan.</p>
            </div>

        </div>
    </div>

    {{-- FOOTER --}}
    <footer class="bg-white py-6 border-t text-center">
        <p class="text-gray-600 text-sm">
            © {{ date('Y') }} Fish Spot BP
        </p>
    </footer>

</body>
</html>
