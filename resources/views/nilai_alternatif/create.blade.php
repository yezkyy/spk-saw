<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Nilai Alternatif
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
            <form action="{{ route('nilai_alternatif.store') }}" method="POST">
                @csrf
                <table class="w-full border-collapse border border-gray-300 dark:border-gray-700">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            <th class="border p-2">Nama Alternatif</th>
                            @foreach($kriterias as $k)
                            <th class="border p-2">{{ $k->nama }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alternatifs as $alt)
                        <tr>
                            <td class="border p-2">{{ $alt->nama }}</td>
                            @foreach($kriterias as $k)
                            <td class="border p-2">
                                <input type="number" name="nilai[{{ $alt->id }}][{{ $k->id }}]" step="0.01" class="w-full p-1 border rounded">
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
