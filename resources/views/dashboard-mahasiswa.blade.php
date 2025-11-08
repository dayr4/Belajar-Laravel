{{-- resources/views/dashboard-mahasiswa.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🎓 Dashboard Mahasiswa
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 space-y-4">
                <h3 class="text-lg font-semibold text-gray-700">Halo, {{ Auth::user()->name }}!</h3>
                <p class="text-gray-600">Anda login sebagai <strong>Mahasiswa</strong>.</p>

                <div class="mt-6">
                    <a href="{{ route('mahasiswa.index') }}"
                       class="inline-block bg-blue-500 text-white px-5 py-3 rounded-lg hover:bg-blue-600 transition">
                        🧾 Lihat Daftar Mahasiswa
                    </a>
                </div>

                <form method="POST" action="{{ route('logout') }}" class="mt-8">
                    @csrf
                    <button type="submit"
                            class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
