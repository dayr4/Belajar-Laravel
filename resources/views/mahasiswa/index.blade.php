{{-- resources/views/mahasiswa/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🧑‍🎓 Daftar Mahasiswa
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">

                @if(session('success'))
                    <div class="mb-4 bg-green-100 text-green-800 p-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex justify-between mb-4">
                    <h3 class="text-lg font-semibold">List Mahasiswa</h3>
                    <a href="{{ route('mahasiswa.create') }}" 
                       class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                        ➕ Tambah Mahasiswa
                    </a>
                </div>

                <table class="min-w-full border border-gray-200 divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left">NIM</th>
                            <th class="px-4 py-2 text-left">Nama</th>
                            <th class="px-4 py-2 text-left">Alamat</th>
                            <th class="px-4 py-2 text-left">Program Studi</th>
                            <th class="px-4 py-2 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($mahasiswa as $m)
                            <tr>
                                <td class="px-4 py-2">{{ $m->nim }}</td>
                                <td class="px-4 py-2">{{ $m->nama }}</td>
                                <td class="px-4 py-2">{{ $m->alamat ?? '-' }}</td>
                                <td class="px-4 py-2">{{ $m->prodi->nama ?? '-' }}</td>
                                <td class="px-4 py-2 text-center">
                                    <a href="{{ route('mahasiswa.edit', $m->id) }}" 
                                       class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 transition">✏️ Edit</a>

                                    <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Yakin ingin menghapus data ini?')" 
                                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-gray-500">Belum ada data mahasiswa.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
