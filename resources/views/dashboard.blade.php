<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Sistem Pendukung Keputusan - Metode SAW
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-gray-100">Data Alternatif</h3>
                <table class="w-full border-collapse border border-gray-300 dark:border-gray-700">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            <th class="border p-2">No</th>
                            <th class="border p-2">Nama Alternatif</th>
                            <th class="border p-2">Hasil SAW</th>
                            <th class="border p-2">Ranking</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alternatifs as $key => $alt)
                        <tr>
                            <td class="border p-2">{{ $key + 1 }}</td>
                            <td class="border p-2">{{ $alt->nama }}</td>
                            <td class="border p-2">{{ number_format($alt->nilai_saw, 4) }}</td>
                            <td class="border p-2">{{ $key + 1 }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>