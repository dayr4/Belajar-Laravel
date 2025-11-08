{{-- resources/views/mahasiswa/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ➕ Tambah Mahasiswa
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('mahasiswa.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-gray-700">NIM</label>
                        <input type="text" name="nim" value="{{ old('nim') }}"
                               class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300" required>
                        @error('nim') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama') }}"
                               class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300" required>
                        @error('nama') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700">Alamat</label>
                        <textarea name="alamat" class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">{{ old('alamat') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700">Program Studi</label>
                        <select name="prodi_id" class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300" required>
                            <option value="">-- Pilih Prodi --</option>
                            @foreach ($prodi as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                        @error('prodi_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('mahasiswa.index') }}"
                           class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500 transition">
                            Batal
                        </a>
                        <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
