<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-secondary text-white">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 min-h-screen bg-sidebar p-4 flex flex-col justify-center">
            <div class="w-full flex flex-col items-center">
                <div class="w-full max-w-[80%]">
                    <!-- Management Section -->
                    <div class="mb-8 mt-16">
                        <h2 class="text-primary font-helvetica font-semibold mb-8">MANAJEMEN</h2>
                        <ul class="space-y-2">
                            @yield('barang')
                            @yield('pelanggan')
                            @yield('pengguna')
                        </ul>
                    </div>
                    
                    <!-- Transaction Section -->
                    <div>
                        <h2 class="text-primary font-helvetica font-semibold mb-8">TRANSAKSI</h2>
                        <ul class="space-y-2">
                            @yield('transaksi')
                            @yield('riwayat-transaksi')
                            @yield('laporan-harian')
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Logout Button -->
            <div class="w-full flex justify-center mt-8">
                <form action="{{ route('logout') }}" method="POST" class="w-full max-w-[80%]">
                    @csrf
                    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded font-poppins">
                        <i class="fas fa-sign-out-alt mr-2 "></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>
