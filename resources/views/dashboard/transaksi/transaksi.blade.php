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
                <h2 class="text-primary text-2xl font-bold font-helvetica">Transaksi</h2>
                <p class="text-gray-400 font-helvetica">Disini anda dapat membuat transaksi baru</p>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div class="flex flex-col mb-4">
                    <label for="id_transaksi" class="text-quaternary mb-2 font-semibold font-poppins">ID Transaksi</label>
                    <input type="text" id="id_transaksi" class="bg-tertiary text-white p-3 rounded-md w-full font-poppins">
                </div>
                <div class="flex flex-col mb-4">
                    <label for="total_harga" class="text-quaternary mb-2 font-semibold font-poppins">Total Harga</label>
                    <input type="text" id="total_harga" class="bg-tertiary text-white p-3 rounded-md w-full font-poppins">
                </div>
                <div class="flex flex-col mb-4">
                    <label for="id_pelanggan" class="text-quaternary mb-2 font-semibold font-poppins">ID Pelanggan</label>
                    <input type="text" id="id_pelanggan" class="bg-tertiary text-white p-3 rounded-md w-full font-poppins">
                </div>
                <div class="flex flex-col mb-4">
                    <label for="tanggal" class="text-quaternary mb-2 font-semibold font-poppins">Tanggal Transaksi</label>
                    <input type="text" id="tanggal" class="bg-tertiary text-white p-3 rounded-md w-full font-poppins">
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
                                <th class="text-center py-4 px-4 text-sm font-helvetica font-semibold text-white uppercase tracking-wider">ID Transaksi</th>
                                <th class="text-center py-4 px-4 text-sm font-helvetica font-semibold text-white uppercase tracking-wider">Total Harga</th>
                                <th class="text-center py-4 px-4 text-sm font-helvetica font-semibold text-white uppercase tracking-wider">ID Pelanggan</th>
                                <th class="text-center py-4 px-4 text-sm font-helvetica font-semibold text-white uppercase tracking-wider">Tanggal Transaksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            <tr class="hover:bg-gray-700 transition-colors duration-200">
                                <td class="py-4 px-4 text-sm text-quaternary text-center font-helvetica">TR001</td>
                                <td class="py-4 px-4 text-sm text-quaternary text-center font-helvetica">Rp 500.000</td>
                                <td class="py-4 px-4 text-sm text-quaternary text-center font-helvetica">PL001</td>
                                <td class="py-4 px-4 text-sm text-quaternary text-center font-helvetica">2024-01-01</td>
                            </tr>
                            <!-- More rows can be added dynamically here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
@endsection
