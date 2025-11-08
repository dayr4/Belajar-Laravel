<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Selamat datang, <span class="text-green-600">{{ Auth::user()->name }}</span> 🎓</h1>
                    <p class="mb-4 text-gray-600">Anda login sebagai <strong>Mahasiswa</strong>.</p>

                    <div class="mt-6">
                        <a href="{{ route('mahasiswa.index') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                            Lihat Data Mahasiswa
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
