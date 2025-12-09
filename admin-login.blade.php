<x-guest-layout>
    <h2 class="text-2xl font-bold mb-4">Login Admin</h2>

    @if (session('error'))
        <div class="bg-red-200 p-2 mb-3 text-red-800 rounded">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf

        <div>
            <label>Email Admin</label>
            <input type="email" name="email" required class="w-full border p-2 rounded mt-1">
        </div>

        <div class="mt-4">
            <label>Password</label>
            <input type="password" name="password" required class="w-full border p-2 rounded mt-1">
        </div>

        <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">
            Login Admin
        </button>
    </form>
</x-guest-layout>
