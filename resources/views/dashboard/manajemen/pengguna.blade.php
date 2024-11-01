@extends('layouts.dashboardAdmin')

{{-- Manajemen --}}
@section('barang')
<li><a href="{{ route('barang.index') }}" class="flex items-center mb-4 font-helvetica font-semibold text-quaternary hover:text-primary transition-colors duration-200"><i class="fas fa-box mr-3 w-5 text-center text-primary"></i>Barang</a></li>
@endsection

@section('pelanggan')
<li><a href="{{ route('pelanggan.index') }}" class="flex items-center mb-4 font-helvetica font-semibold text-quaternary hover:text-primary transition-colors duration-200"><i class="fas fa-users mr-3 w-5 text-center text-primary"></i>Pelanggan</a></li>
@endsection

@if(auth()->user()->role === 'admin')
    @section('pengguna')
    <li><a href="{{ route('pengguna.index') }}" class="flex items-center mb-4 font-helvetica font-semibold text-quaternary hover:text-primary transition-colors duration-200"><i class="fas fa-user mr-3 w-5 text-center text-primary"></i>Pengguna</a></li>
    @endsection
@endif


{{-- Transaksi --}}
@section('transaksi')
<li><a href="{{ route('transaksi.index') }}" class="flex items-center mb-4 font-helvetica font-semibold text-quaternary hover:text-primary transition-colors duration-200"><i class="fas fa-exchange-alt mr-3 w-5 text-center text-primary"></i>Transaksi</a></li>
@endsection

@section('riwayat-transaksi')
<li><a href="{{ route('riwayat-transaksi.index') }}" class="flex items-center mb-4 font-helvetica font-semibold text-quaternary hover:text-primary transition-colors duration-200"><i class="fas fa-history mr-3 w-5 text-center text-primary"></i>Riwayat Transaksi</a></li>
@endsection

@if(auth()->user()->role === 'admin')
    @section('laporan-harian')
    <li><a href="{{ route('laporan-harian.index') }}" class="flex items-center mb-4 font-helvetica font-semibold text-quaternary hover:text-primary transition-colors duration-200"><i class="fas fa-file-alt mr-3 w-5 text-center text-primary"></i>Laporan Harian</a></li>
    @endsection
@endif

@section('content')
        <main class="flex-1 py-20 px-32 bg-secondary">
            <div class="mb-14">
                <h2 class="text-primary text-2xl font-bold font-helvetica">Pengguna</h2>
                <p class="text-gray-400 font-helvetica">Disini anda dapat membuat pengguna baru</p>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div class="flex flex-col mb-4">
                    <label for="id_pengguna" class="text-quaternary mb-2 font-semibold font-poppins">ID Pengguna</label>
                    <input type="text" id="id_pengguna" class="bg-tertiary text-white p-3 rounded-md w-full font-poppins">
                </div>
                <div class="flex flex-col mb-4">
                    <label for="username" class="text-quaternary mb-2 font-semibold font-poppins">Username</label>
                    <input type="text" id="username" class="bg-tertiary text-white p-3 rounded-md w-full font-poppins">
                </div>
                <div class="flex flex-col mb-4">
                    <label for="password" class="text-quaternary mb-2 font-semibold font-poppins">Password</label>
                    <input type="text" id="password" class="bg-tertiary text-white p-3 rounded-md w-full font-poppins">
                </div>
                <div class="flex flex-col mb-4">
                    <label for="role" class="text-quaternary mb-2 font-semibold font-poppins">Role</label>
                    <input type="text" id="role" class="bg-tertiary text-white p-3 rounded-md w-full font-poppins">
                </div>
            </div>

            <div class="flex justify-start space-x-4 mb-10 mt-4">
                <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md transition duration-300 ease-in-out font-poppins">
                    Hapus
                </button>
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md transition duration-300 ease-in-out font-poppins">
                    Simpan
                </button>
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-md transition duration-300 ease-in-out font-poppins">
                    Tambah
                </button>
            </div>

            <div class="bg-tertiary rounded-lg p-4 shadow-lg">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-700">
                                <th class="text-center py-4 px-4 text-sm font-helvetica font-semibold text-white uppercase tracking-wider">ID Pengguna</th>
                                <th class="text-center py-4 px-4 text-sm font-helvetica font-semibold text-white uppercase tracking-wider">Username</th>
                                <th class="text-center py-4 px-4 text-sm font-helvetica font-semibold text-white uppercase tracking-wider">Password</th>
                                <th class="text-center py-4 px-4 text-sm font-helvetica font-semibold text-white uppercase tracking-wider">Role</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            <tr class="hover:bg-gray-700 transition-colors duration-200">
                                <td class="py-4 px-4 text-sm text-quaternary text-center font-helvetica">PG001</td>
                                <td class="py-4 px-4 text-sm text-quaternary text-center font-helvetica">John</td>
                                <td class="py-4 px-4 text-sm text-quaternary text-center font-helvetica">12345678</td>
                                <td class="py-4 px-4 text-sm text-quaternary text-center font-helvetica">Admin</td>
                            </tr>
                            <!-- More rows can be added dynamically here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
@endsection
