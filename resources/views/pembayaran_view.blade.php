@include('components.header_dashboard')
@include('components.sidebar')

<main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-100 min-h-screen transition-all main">
    @include('components.navbar')

    <!-- Content -->
    <div class="p-6 space-y-8">

        {{-- Alert Success / Error --}}
        @if (Session::has('ok'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-md shadow-sm">
                <p class="font-semibold">Berhasil</p>
                <p class="text-sm">{{ Session::get('ok') }}</p>
            </div>
        @endif

        @if (Session::has('err'))
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-md shadow-sm">
                <p class="font-semibold">Terjadi Kesalahan</p>
                <p class="text-sm">{{ Session::get('err') }}</p>
            </div>
        @endif

        {{-- Data Pending --}}
        <div class="bg-white shadow-md rounded-md overflow-hidden">
            <div class="px-6 py-4 border-b bg-gray-50">
                <h3 class="font-bold text-gray-800 text-lg">Data Pembayaran Yang Belum Diperiksa</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-gray-700">
                    <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3 text-left">No</th>
                            <th class="px-4 py-3 text-left">Nama Member</th>
                            <th class="px-4 py-3 text-left">Keperluan Membeli</th>
                            <th class="px-4 py-3 text-left">Tanggal</th>
                            <th class="px-4 py-3 text-left">Bukti Bayar</th>
                            <th class="px-4 py-3 text-left">Metode Bayar</th>
                            <th class="px-4 py-3 text-left">Status</th>
                            <th class="px-4 py-3 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_pembayaran_pending as $data)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">{{ $data->user->name }}</td>
                                <td class="px-4 py-3">{{ $data->kursus->nama_kursus }}</td>
                                <td class="px-4 py-3">{{ $data->tanggal }}</td>
                                <td class="px-4 py-3">
                                    <a href="{{ $data->bukti_bayar }}" target="_blank"
                                       class="text-blue-500 font-medium hover:underline">
                                        Lihat Bukti
                                    </a>
                                </td>
                                <td class="px-4 py-3">{{ $data->metode_bayar }}</td>
                                <td class="px-4 py-3">
                                    <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs">
                                        Menunggu
                                    </span>
                                </td>
                                <td class="px-4 py-3 flex gap-2">
                                    <form action="/pembayaran/accept/{{ $data->id }}" method="post">
                                        @csrf
                                        <button type="submit"
                                            class="bg-green-500 hover:bg-green-600 text-white px-3 py-1.5 rounded-md text-xs font-medium shadow">
                                            Accept
                                        </button>
                                    </form>
                                    <form action="/pembayaran/delete/{{ $data->id }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-md text-xs font-medium shadow">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Data Valid --}}
        <div class="bg-white shadow-md rounded-md overflow-hidden">
            <div class="px-6 py-4 border-b bg-gray-50">
                <h3 class="font-bold text-gray-800 text-lg">Pembayaran Yang Telah Valid</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-gray-700">
                    <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3 text-left">No</th>
                            <th class="px-4 py-3 text-left">Nama Member</th>
                            <th class="px-4 py-3 text-left">Keperluan Membeli</th>
                            <th class="px-4 py-3 text-left">Tanggal</th>
                            <th class="px-4 py-3 text-left">Bukti Bayar</th>
                            <th class="px-4 py-3 text-left">Metode Bayar</th>
                            <th class="px-4 py-3 text-left">Status</th>
                            <th class="px-4 py-3 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_pembayaran as $data)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">{{ $data->user->name }}</td>
                                <td class="px-4 py-3">{{ $data->kursus->nama_kursus }}</td>
                                <td class="px-4 py-3">{{ $data->tanggal }}</td>
                                <td class="px-4 py-3">
                                    <a href="{{ $data->bukti_bayar }}" target="_blank"
                                       class="text-blue-500 font-medium hover:underline">
                                        Lihat Bukti
                                    </a>
                                </td>
                                <td class="px-4 py-3">{{ $data->metode_bayar }}</td>
                                <td class="px-4 py-3">
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">
                                        Valid
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <form action="/pembayaran/delete/{{ $data->id }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-md text-xs font-medium shadow">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Tombol Data Terhapus --}}
        <div class="flex justify-end">
            <button onclick="handleToggleDeleteTable()" type="button"
                class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-md text-sm font-medium shadow">
                Tampilkan Data Yang Dihapus
            </button>
        </div>

        {{-- Data Terhapus --}}
        <div id="table_delete" class="bg-white hidden shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4 border-b bg-gray-50">
                <h3 class="font-bold text-gray-800 text-lg">Data Yang Terhapus</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-gray-700">
                    <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3 text-left">No</th>
                            <th class="px-4 py-3 text-left">Nama Member</th>
                            <th class="px-4 py-3 text-left">Keperluan Membeli</th>
                            <th class="px-4 py-3 text-left">Tanggal</th>
                            <th class="px-4 py-3 text-left">Bukti Bayar</th>
                            <th class="px-4 py-3 text-left">Metode Bayar</th>
                            <th class="px-4 py-3 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_delete as $data)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">{{ $data->user->name }}</td>
                                <td class="px-4 py-3">{{ $data->kursus->nama_kursus }}</td>
                                <td class="px-4 py-3">{{ $data->tanggal }}</td>
                                <td class="px-4 py-3">
                                    <a href="{{ $data->bukti_bayar }}" target="_blank"
                                       class="text-blue-500 font-medium hover:underline">
                                        Lihat Bukti
                                    </a>
                                </td>
                                <td class="px-4 py-3">{{ $data->metode_bayar }}</td>
                                <td class="px-4 py-3">
                                    <form action="/pembayaran/restore/{{ $data->id }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="bg-indigo-500 hover:bg-indigo-600 text-white px-3 py-1.5 rounded-md text-xs font-medium shadow">
                                            Restore
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
</main>

<script>
    function handleToggleDeleteTable() {
        document.getElementById('table_delete').classList.toggle('hidden');
    }
</script>
