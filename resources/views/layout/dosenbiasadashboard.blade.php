<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Dosen Biasa')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white p-4 hidden md:block">
            <div class="text-2xl font-bold mb-6">
                <!-- Tampilkan role yang sedang login -->
                @if (Auth::user()->role === 'dosen_biasa')
                    <h2>
                        @if (Auth::user()->name === 'Dosen Biasa 1')
                            Dosen Biasa 1
                        @elseif(Auth::user()->name === 'Dosen Biasa 2')
                            Dosen Biasa 2
                        @elseif(Auth::user()->name === 'Dosen Biasa 3')
                            Dosen Biasa 3
                        @endif
                    </h2>
                @endif
            </div>
            <hr width="100%" height="2px">
            <nav>
                <nav>
                    <ul>
                        <li class="mb-4">
                            <a href="{{ route('layout.dosenbiasadasbor') }}"
                                class="flex items-center hover:bg-gray-700 p-2 rounded {{ request()->routeIs('layout.dosenbiasadasbor') ? 'bg-gray-700' : '' }}">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                                Dasbor
                            </a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('dosen_biasa.profile') }}"
                                class="flex items-center hover:bg-gray-700 p-2 rounded {{ request()->routeIs('post.profile') ? 'bg-gray-700' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-6 h-6 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                                Profil
                            </a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('dosen_biasa.jadwal') }}"
                                class="flex items-center hover:bg-gray-700 p-2 rounded {{ request()->routeIs('dosen_biasa.jadwal') ? 'bg-gray-700' : '' }}">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                </svg>
                                Jadwal
                            </a>
                        </li>
                    </ul>
                    <hr width="100%" height="2px">
                    <ul>
                        <li class="mb-4">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="flex items-center hover:bg-gray-700 p-2 rounded">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                </svg>
                                Logout
                            </a>
                        </li>
                    </ul>
                </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-4">
            <button class="md:hidden bg-gray-800 text-white p-2 rounded mb-4" id="menuToggle">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
            @yield('content')
        </main>
    </div>

    <script>
        document.getElementById('menuToggle').addEventListener('click', function() {
            document.querySelector('aside').classList.toggle('hidden');
        });
    </script>
</body>

</html>
