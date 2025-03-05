<aside class="w-64 bg-white dark:bg-gray-800 min-h-screen shadow-md">
    <div class="p-4">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Dashboard Menu</h2>
        <nav class="mt-4">
            <ul>
                <li class="mb-2">
                    <a href="{{ route('dashboard') }}" class="block p-2 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">Dashboard</a>
                </li>
                <li class="mb-2">
                    <a href="#" class="block p-2 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">Data Alternatif</a>
                </li>
                <li class="mb-2">
                    <a href="#" class="block p-2 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">Data Kriteria</a>
                </li>
                <li class="mb-2">
                    <a href="#" class="block p-2 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">Perhitungan SAW</a>
                </li>
                <li class="mb-2">
                    <a href="#" class="block p-2 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">Hasil Ranking</a>
                </li>
                <li class="mt-4 border-t pt-2">
                    <a href="{{ route('profile.edit') }}" class="block p-2 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">Pengaturan Profil</a>
                </li>
                <li class="mb-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left p-2 text-red-600 hover:bg-red-100 dark:hover:bg-red-700 rounded">Logout</button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
