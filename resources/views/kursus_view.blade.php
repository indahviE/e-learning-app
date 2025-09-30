@include('components.header_dashboard')
@include('components.sidebar')

<main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-100 min-h-screen transition-all main">
    @include('components.navbar')

    <!-- Content -->
    <div class="p-6 max-w-6xl mx-auto"> {{-- biar konten tidak melebar full --}}
        <div class="grid grid-cols-1 gap-6 mb-6">
            <div class="p-6 relative flex flex-col bg-white shadow-md rounded-lg border border-gray-200">
                {{-- Alert Message --}}
                @if (Session::has('ok'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md" role="alert">
                        <p class="font-bold">Berhasil!!</p>
                        <p class="text-sm">{{ Session::get('ok') }}</p>
                    </div>
                @endif

                @if (Session::has('err'))
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md" role="alert">
                        <p class="font-bold">Something Error!!</p>
                        <p class="text-sm">{{ Session::get('err') }}</p>
                    </div>
                @endif

                {{-- Header --}}
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-semibold text-lg text-gray-800">Data Kursus</h3>
                </div>

                {{-- Table --}}
                <div class="overflow-x-auto rounded-md border border-gray-200">
                    <table class="w-full text-sm text-left text-gray-700">
                        <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                            <tr>
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Nama Kursus</th>
                                <th class="px-4 py-3">Deskripsi</th>
                                <th class="px-4 py-3">Tanggal</th>
                                <th class="px-4 py-3">Foto</th>
                                <th class="px-4 py-3">Harga/Category</th>
                                <th class="px-4 py-3">Like</th>
                                <th class="px-4 py-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_kursus as $data)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3 font-medium">{{ $data->nama_kursus }}</td>
                                    <td class="px-4 py-3">
                                        <div class="line-clamp-2">
                                            {{ $data->deskripsi }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">{{ $data->tanggal }}</td>
                                    <td class="px-4 py-3">
                                        <a href="{{ $data->foto }}" target="_blank">
                                            <div class="w-20 h-20 bg-cover bg-center rounded-md border"
                                                 style="background-image: url('{{ $data->foto }}');"></div>
                                        </a>
                                    </td>
                                    <td class="px-4 py-3">
                                        Rp.{{ $data->harga }} <br>
                                        <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                            {{ $data->category->nama_pelajaran }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3">{{ $data->like }}</td>
                                    <td class="px-4 py-3 space-y-2">
                                        <a href="/kursus/{{$data->id}}/video"
                                           class="block text-center text-white bg-green-500 hover:bg-green-600 rounded-md px-3 py-1.5 text-xs font-medium">
                                           Lihat Video →
                                        </a>
                                        <a href="/kursus/update/{{ $data->id }}"
                                           class="block text-center text-white bg-cyan-500 hover:bg-cyan-600 rounded-md px-3 py-1.5 text-xs font-medium">
                                           Update
                                        </a>
                                        <form action="/kursus/delete/{{ $data->id }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                    class="w-full text-center text-white bg-red-500 hover:bg-red-600 rounded-md px-3 py-1.5 text-xs font-medium">
                                                Delete
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
                    {{ $data_kursus->links() }}
                </div>
            </div>

            {{-- Buttons --}}
            <div class="flex gap-3">
                <a href="/kursus/create"
                   class="text-white bg-teal-500 hover:bg-teal-600 font-medium rounded-md text-sm px-5 py-2.5 text-center">
                   + Tambah Kursus Baru
                </a>

                <button onclick="handleToggleDeleteTable()" type="button"
                        class="text-white bg-red-500 hover:bg-red-600 font-medium rounded-md text-sm px-5 py-2.5">
                        Data Terhapus
                </button>
            </div>

            {{-- Table Delete (Hidden) --}}
            <div id="table_delete" class="hidden bg-white border border-gray-200 shadow-md p-6 rounded-md mt-4">
                <h4 class="font-semibold text-gray-800 mb-4">🗑 Data Yang Terhapus</h4>
                <div class="overflow-x-auto rounded-md border border-gray-200">
                    <table class="w-full text-sm text-left text-gray-700">
                        <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                            <tr>
                                <th class="px-4 py-3">#</th>
                                <th class="px-4 py-3">Nama Kursus</th>
                                <th class="px-4 py-3">Deskripsi</th>
                                <th class="px-4 py-3">Tanggal</th>
                                <th class="px-4 py-3">Foto</th>
                                <th class="px-4 py-3">Harga/Category</th>
                                <th class="px-4 py-3">Like</th>
                                <th class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_delete as $data)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3 font-medium">{{ $data->nama_kursus }}</td>
                                    <td class="px-4 py-3">
                                        <div class="line-clamp-2">{{ $data->deskripsi }}</div>
                                    </td>
                                    <td class="px-4 py-3">{{ $data->tanggal }}</td>
                                    <td class="px-4 py-3">
                                        <a href="{{ $data->foto }}" target="_blank">
                                            <div class="w-20 h-20 bg-cover bg-center rounded-md border"
                                                 style="background-image: url('{{ $data->foto }}');"></div>
                                        </a>
                                    </td>
                                    <td class="px-4 py-3">
                                        Rp.{{ $data->harga }} /
                                        <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                            {{ $data->category->nama_pelajaran }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3">{{ $data->like }}</td>
                                    <td class="px-4 py-3">
                                        <form action="/kursus/restore/{{ $data->id }}" method="post">
                                            @csrf
                                            <button type="submit"
                                                    class="text-white bg-indigo-500 hover:bg-indigo-600 rounded-md px-3 py-1.5 text-xs font-medium">
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
    </div>
</main>

<script>
    function handleToggleDeleteTable() {
        document.getElementById('table_delete').classList.toggle('hidden');
    }
</script>
