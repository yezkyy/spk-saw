<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Data Alternatif
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('alternatif.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Alternatif</a>

        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg mt-4 p-6">
            <table class="w-full border-collapse border border-gray-300 dark:border-gray-700">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                        <th class="border p-2">No</th>
                        <th class="border p-2">Nama Alternatif</th>
                        <th class="border p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alternatifs as $key => $alt)
                    <tr>
                        <td class="border p-2">{{ $key + 1 }}</td>
                        <td class="border p-2">{{ $alt->nama }}</td>
                        <td class="border p-2">
                            <a href="{{ route('alternatif.edit', $alt->id) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('alternatif.destroy', $alt->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
