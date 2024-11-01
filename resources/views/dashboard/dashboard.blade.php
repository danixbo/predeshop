@extends('layouts.dashboardAdmin')


{{-- Manajemen --}}
@section('barang')
<li><a href="{{ route('barang.index') }}" class="flex items-center mb-4 font-helvetica font-semibold text-quaternary hover:text-primary transition-colors duration-200"><i class="fas fa-box mr-3 w-5 text-center text-primary"></i>Barang</a></li>
@endsection

@section('pelanggan')
<li><a href="{{ route('pelanggan.index') }}" class="flex items-center mb-4 font-helvetica font-semibold text-quaternary hover:text-primary transition-colors duration-200"><i class="fas fa-users mr-3 w-5 text-center text-primary"></i>Pelanggan</a></li>
@endsection

@if(Auth::guard('admin')->user()->role === 'admin')
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

@if(Auth::guard('admin')->user()->role === 'admin')
    @section('laporan-harian')
    <li><a href="{{ route('laporan-harian.index') }}" class="flex items-center mb-4 font-helvetica font-semibold text-quaternary hover:text-primary transition-colors duration-200"><i class="fas fa-file-alt mr-3 w-5 text-center text-primary"></i>Laporan Harian</a></li>
    @endsection
@endif
