@include('components.header_dashboard')
@include('components.sidebar')

<main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
    @include('components.navbar')

    <!-- Content -->
    <div class="p-6 max-w-6xl mx-auto">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">

            {{-- Notifikasi --}}
            @if (Session::has('ok'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded">
                    <p class="font-bold">Berhasil!</p>
                    <p class="text-sm">{{ Session::get('ok') }}</p>
                </div>
            @endif

            @if (Session::has('err'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">
                    <p class="font-bold">Terjadi Kesalahan!</p>
                    <p class="text-sm">{{ Session::get('err') }}</p>
                </div>
            @endif

            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-50 mb-4">Data Video</h3>

            {{-- Tabel Video --}}
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-100 uppercase text-xs">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Nama Video</th>
                            <th class="px-4 py-3">Nama Kursus</th>
                            <th class="px-4 py-3">Urutan Playlist</th>
                            <th class="px-4 py-3">Durasi</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_video as $data)
                            <tr class="border-b dark:border-gray-700 text-gray-700 dark:text-gray-200">
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2">{{ $data->nama_vidio }}</td>
                                <td class="px-4 py-2">{{ $kursus->nama_kursus }}</td>
                                <td class="px-4 py-2">{{ $data->urutan_dalam_playlist }}</td>
                                <td class="px-4 py-2">{{ $data->durasi }} menit</td>
                                <td class="px-4 py-2 flex flex-col gap-2">
                                    <a href="{{ $data->url }}" target="_blank"
                                       class="text-white bg-green-500 hover:bg-green-600 font-medium rounded-md text-xs px-3 py-1.5 text-center">
                                       Tonton
                                    </a>
                                    <a href="/kursus/{{ $kursus->id }}/video/update/{{ $data->id }}"
                                       class="text-white bg-cyan-500 hover:bg-cyan-600 font-medium rounded-md text-xs px-3 py-1.5 text-center">
                                       Update
                                    </a>
                                    <form action="/kursus/{{ $kursus->id }}/video/delete/{{ $data->id }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="w-full text-white bg-red-500 hover:bg-red-600 font-medium rounded-md text-xs px-3 py-1.5 text-center">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-4">
                {{ $data_video->links() }}
            </div>

            {{-- Tombol Tambah & Restore --}}
            <div class="flex gap-2 mt-6">
                <a href="/kursus/{{ $kursus->id }}/video/create"
                   class="text-white bg-teal-500 hover:bg-teal-600 font-medium rounded-md text-sm px-5 py-2.5 text-center">
                   + Tambah Video Baru
                </a>
                <button onclick="handleToggleDeleteTable()" type="button"
                    class="text-white bg-red-500 hover:bg-red-600 font-medium rounded-md text-sm px-5 py-2.5 text-center">
                    Tampilkan Data Terhapus
                </button>
            </div>

            {{-- Table Restore --}}
            <div id="table_delete" class="hidden mt-6 bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-md p-4">
                <h4 class="text-sm font-semibold text-gray-800 dark:text-gray-100 mb-3">Data Video Terhapus</h4>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-600 text-gray-600 dark:text-gray-100 uppercase text-xs">
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Nama Video</th>
                                <th class="px-4 py-3">Nama Kursus</th>
                                <th class="px-4 py-3">Urutan</th>
                                <th class="px-4 py-3">Durasi</th>
                                <th class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_delete as $data)
                                <tr class="border-b dark:border-gray-600 text-gray-700 dark:text-gray-200">
                                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2">{{ $data->nama_vidio }}</td>
                                    <td class="px-4 py-2">{{ $kursus->nama_kursus }}</td>
                                    <td class="px-4 py-2">{{ $data->urutan_dalam_playlist }}</td>
                                    <td class="px-4 py-2">{{ $data->durasi }} menit</td>
                                    <td class="px-4 py-2">
                                        <form action="/kursus/{{ $kursus->id }}/video/restore/{{ $data->id }}" method="post">
                                            @csrf
                                            <button type="submit"
                                                class="text-white bg-red-500 hover:bg-red-600 font-medium rounded-md text-xs px-3 py-1.5">
                                                ↩ Restore
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function handleToggleDeleteTable() {
        document.getElementById('table_delete').classList.toggle('hidden');
    }
</script>
