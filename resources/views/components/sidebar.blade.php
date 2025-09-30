<!--sidenav -->
<div class="fixed left-0 top-0 w-64 h-full bg-[#FFFFFF] p-4 z-50 sidebar-menu transition-transform">
    <a href="/" class="flex items-center pb-4 border-b border-b-gray-800">

        <h2 class="font-bold text-3xl flex gap-1 items-center">

            <img src="{{ asset('icon.png') }}" class="w-5 h-5 me-2" alt="">
            RUANG<span class="bg-blue-900 text-white px-2 rounded-md">ILMU</span>
        </h2>
    </a>
    <ul class="mt-4">
        {{-- <span class="text-gray-400 font-bold">ADMIN</span> --}}

        @if (Auth::user() && Auth::user()->role == 'pengajar')
            <li class="mb-1 group">
                <a href="/profile"
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class=' mr-1.5 text-lg ms-1'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm10 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1m0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1m0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1m-8-5a3 3 0 1 1 6 0a3 3 0 0 1-6 0m1.942 4a3 3 0 0 0-2.847 2.051l-.044.133l-.004.012c-.042.126-.055.167-.042.195c.006.013.02.023.038.039c.032.025.08.064.146.155A1 1 0 0 0 6 17h6a1 1 0 0 0 .811-.415a.7.7 0 0 1 .146-.155c.019-.016.031-.026.038-.04c.014-.027 0-.068-.042-.194l-.004-.012l-.044-.133A3 3 0 0 0 10.059 14z"
                                clip-rule="evenodd" />
                        </svg>
                    </i>
                    <span class="text-sm">My Profile</span>
                    {{-- <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i> --}}
                </a>
            </li>
        @endif

        @if (Auth::user() && Auth::user()->role == 'admin')
            <li class="mb-1 group">
                <a href="/user"
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class=' mr-1.5 text-lg ms-1'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512">
                            <path fill="currentColor"
                                d="M256 256a112 112 0 1 0-112-112a112 112 0 0 0 112 112m0 32c-69.42 0-208 42.88-208 128v64h416v-64c0-85.12-138.58-128-208-128" />
                        </svg>
                    </i>
                    <span class="text-sm">Users</span>
                    {{-- <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i> --}}
                </a>
            </li>

            <li class="mb-1 group">
                <a href="/pengajar"
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class='mr-1.5 text-lg hover:text-white'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256">
                            <path fill="currentColor"
                                d="M216 40H40a16 16 0 0 0-16 16v144a16 16 0 0 0 16 16h13.39a8 8 0 0 0 7.23-4.57a48 48 0 0 1 86.76 0a8 8 0 0 0 7.23 4.57H216a16 16 0 0 0 16-16V56a16 16 0 0 0-16-16M104 168a32 32 0 1 1 32-32a32 32 0 0 1-32 32m112 32h-56.57a64 64 0 0 0-13.16-16H192a8 8 0 0 0 8-8V80a8 8 0 0 0-8-8H64a8 8 0 0 0-8 8v96a8 8 0 0 0 6 7.75A63.7 63.7 0 0 0 48.57 200H40V56h176Z" />
                        </svg>
                    </i>
                    <span class="text-sm">
                        Pengajar
                    </span>
                    {{-- <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i> --}}
                </a>

            </li>
        @endif

        @if (Auth::user() && Auth::user()->role == 'pengajar')
            <li class="mb-1 group">
                <a href="/kursus"
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class=' mr-1.5 text-lg'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                d="M26.581 32.259c2.907-1.324 8.181-9.236 9.635-16.772c-6.04-1.776-5.264-10.258.753-9.742c5.393.355 7.73 7.514 2.917 19.71c-7.352 15.082-24.263 26.084-20.916 5.587c3.854-17.33-.7-16.696-4.65-15.77c-3.617.883-2.885 6.308-1.27 6.965c5.716 3.53.775 10.98-5.878 2.82c-4.92-8.902 1.669-17.805 11.25-16.405c8.902 2.874 9.515 11.12 7.244 20.464q-1.077 4.036.915 3.143"
                                stroke-width="1" />
                        </svg>
                    </i>
                    <span class="text-sm">Kursus</span>
                    {{-- <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i> --}}
                </a>

            </li>
        @endif

        @if (Auth::user() && Auth::user()->role == 'admin')
            <li class="mb-1 group">
                <a href="/category"
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class='mr-1.5 text-lg'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M2 5a3 3 0 0 1 3-3h6.172a3 3 0 0 1 2.12.879l8 8a3 3 0 0 1 0 4.242l-6.17 6.172a3 3 0 0 1-4.243 0l-8-8A3 3 0 0 1 2 11.172zm5 1a1 1 0 0 0 0 2h.001a1 1 0 0 0 0-2z"
                                clip-rule="evenodd" />
                        </svg>
                    </i>
                    <span class="text-sm">Category</span>
                    {{-- <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i> --}}
                </a>
            </li>
        @endif

        @if (Auth::user() && Auth::user()->role == 'pengajar')
            <li class="mb-1 group">
                <a href="/pembayaran"
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class=' mr-1.5 text-lg'>

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 14 14">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M1.5 0A1.5 1.5 0 0 0 0 1.5v6A1.5 1.5 0 0 0 1.5 9h11A1.5 1.5 0 0 0 14 7.5v-6A1.5 1.5 0 0 0 12.5 0zm6.125 1.454a.625.625 0 1 0-1.25 0v.4a1.532 1.532 0 0 0-.15 3.018l1.197.261a.39.39 0 0 1-.084.773h-.676a.39.39 0 0 1-.369-.26a.625.625 0 0 0-1.178.416c.194.55.673.965 1.26 1.069v.415a.625.625 0 1 0 1.25 0V7.13a1.641 1.641 0 0 0 .064-3.219L6.492 3.65a.281.281 0 0 1 .06-.556h.786a.39.39 0 0 1 .369.26a.625.625 0 1 0 1.178-.416a1.64 1.64 0 0 0-1.26-1.069zM2.75 3.75a.75.75 0 1 1 0 1.5a.75.75 0 0 1 0-1.5m8.5 0a.75.75 0 1 1 0 1.5a.75.75 0 0 1 0-1.5M4.5 9.875c.345 0 .625.28.625.625v2a.625.625 0 1 1-1.25 0v-2c0-.345.28-.625.625-.625m5.625.625a.625.625 0 1 0-1.25 0v2a.625.625 0 1 0 1.25 0zm-2.5.75a.625.625 0 1 0-1.25 0v2a.625.625 0 1 0 1.25 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </i>
                    <span class="text-sm">Pembayaran</span>
                    {{-- <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i> --}}
                </a>
            </li>
        @endif

        <li class="mb-1 group">
            <form action="/logout" method="post">
                @csrf

                <button type="submit"
                    class="flex w-full font-semibold items-center py-2 px-4 text-gray-900 hover:bg-red-500 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='mr-1.5 text-lg'>

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M18 2H6a1 1 0 0 0-1 1v9l5-4v3h6v2h-6v3l-5-4v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1" />
                        </svg>
                    </i>
                    <span class="text-sm">Logout</span>
                </button>
            </form>
        </li>

    </ul>
</div>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
<!-- end sidenav -->
