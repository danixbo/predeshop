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
                <h2 class="text-primary text-2xl font-bold font-helvetica">Riwayat Transaksi</h2>
                <p class="text-quaternary font-helvetica">Semua riwayat data Riwayat Transaksi muncul di bidang ini</p>
            </div>

            <div class="mb-8">
                <div class="flex items-center">
                    <input type="text" placeholder="Cari Transaksi" class="bg-tertiary text-quaternary p-3 rounded-l-md w-full font-poppins">
                    <button class="bg-primary hover:bg-primary/80 text-quaternary font-semibold py-3 px-6 rounded-r-md transition duration-300 ease-in-out font-poppins">
                        Cari
                    </button>
                </div>
            </div>

            <div class="bg-tertiary rounded-lg p-4 shadow-lg">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-secondary">
                                <th class="text-left py-4 px-4 text-sm font-helvetica font-semibold text-quaternary uppercase tracking-wider">ID Transaksi</th>
                                <th class="text-left py-4 px-4 text-sm font-helvetica font-semibold text-quaternary uppercase tracking-wider">ID Pelanggan</th>
                                <th class="text-left py-4 px-4 text-sm font-helvetica font-semibold text-quaternary uppercase tracking-wider">Tanggal Transaksi</th>
                                <th class="text-left py-4 px-4 text-sm font-helvetica font-semibold text-quaternary uppercase tracking-wider">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-secondary">
                            <!-- Sample row, you can populate this dynamically with your data -->
                            <tr class="hover:bg-secondary/50 transition-colors duration-200">
                                <td class="py-4 px-4 text-sm text-quaternary font-helvetica">TR001</td>
                                <td class="py-4 px-4 text-sm text-quaternary font-helvetica">PL001</td>
                                <td class="py-4 px-4 text-sm text-quaternary font-helvetica">2024-01-01</td>
                                <td class="py-4 px-4 text-sm text-quaternary font-helvetica">Rp 500.000</td>
                            </tr>
                            <!-- More rows can be added dynamically here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
@endsection
