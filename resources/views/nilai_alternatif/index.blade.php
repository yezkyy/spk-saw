<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Nilai Alternatif
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('nilai_alternatif.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Nilai Alternatif</a>

        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg mt-4 p-6">
            <table class="w-full border-collapse border border-gray-300 dark:border-gray-700">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                        <th class="border p-2">No</th>
                        <th class="border p-2">Nama Alternatif</th>
                        @foreach($kriterias as $k)
                        <th class="border p-2">{{ $k->nama }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($alternatifs as $key => $alt)
                    <tr>
                        <td class="border p-2">{{ $key + 1 }}</td>
                        <td class="border p-2">{{ $alt->nama }}</td>
                        @foreach($kriterias as $k)
                        <td class="border p-2">
                            {{ optional($nilaiAlternatifs->where('alternatif_id', $alt->id)->where('kriteria_id', $k->id)->first())->nilai ?? '-' }}
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
