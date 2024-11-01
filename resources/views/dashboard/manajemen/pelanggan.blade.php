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
                <h2 class="text-primary text-2xl font-bold font-helvetica">Pelanggan</h2>
                <p class="text-gray-400 font-helvetica">Disini anda dapat membuat pelanggan baru</p>
            </div>

            <form id="pelangganForm" action="{{ route('pelanggan.store') }}" method="POST">
                @csrf
                <input type="hidden" name="_method" id="method" value="POST">
                
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex flex-col mb-4">
                        <label for="id_pelanggan" class="text-quaternary mb-2 font-semibold font-poppins">ID Pelanggan</label>
                        <input type="text" id="id_pelanggan" name="id_pelanggan" value="{{ $nextId }}" class="bg-tertiary text-white p-3 rounded-md w-full font-poppins" readonly>
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="nama_pelanggan" class="text-quaternary mb-2 font-semibold font-poppins">Nama Pelanggan</label>
                        <input type="text" id="nama_pelanggan" name="nama_pelanggan" class="bg-tertiary text-white p-3 rounded-md w-full font-poppins" required>
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="alamat" class="text-quaternary mb-2 font-semibold font-poppins">Alamat</label>
                        <input type="text" id="alamat" name="alamat" class="bg-tertiary text-white p-3 rounded-md w-full font-poppins" required>
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="telepon" class="text-quaternary mb-2 font-semibold font-poppins">No. Telp</label>
                        <input type="text" id="telepon" name="telepon" class="bg-tertiary text-white p-3 rounded-md w-full font-poppins" required>
                    </div>
                </div>

                <div class="flex justify-start space-x-4 mb-10 mt-4">
                    <button type="button" id="btnHapus" class="hidden bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md transition duration-300 ease-in-out font-poppins">
                        Hapus
                    </button>
                    <button type="button" id="btnHapusForm" class="hidden bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md transition duration-300 ease-in-out font-poppins">
                        Kosongkan Form
                    </button>
                    <button type="submit" id="btnSimpan" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md transition duration-300 ease-in-out font-poppins">
                        Simpan
                    </button>
                    <button type="button" id="btnBaru" class="hidden bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md transition duration-300 ease-in-out font-poppins">
                        Tambah Baru
                    </button>
                </div>
            </form>

            <div class="bg-tertiary rounded-lg p-4 shadow-lg">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-700">
                                <th class="text-center py-4 px-4 text-sm font-helvetica font-semibold text-white uppercase tracking-wider">ID Pelanggan</th>
                                <th class="text-center py-4 px-4 text-sm font-helvetica font-semibold text-white uppercase tracking-wider">Nama Pelanggan</th>
                                <th class="text-center py-4 px-4 text-sm font-helvetica font-semibold text-white uppercase tracking-wider">Alamat</th>
                                <th class="text-center py-4 px-4 text-sm font-helvetica font-semibold text-white uppercase tracking-wider">No. Telp</th>
                                <th class="text-center py-4 px-4 text-sm font-helvetica font-semibold text-white uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            @foreach($pelanggans as $pelanggan)
                            <tr class="hover:bg-gray-700 transition-colors duration-200">
                                <td class="py-4 px-4 text-sm text-quaternary text-center font-helvetica">{{ $pelanggan->id_pelanggan }}</td>
                                <td class="py-4 px-4 text-sm text-quaternary text-center font-helvetica">{{ $pelanggan->nama_pelanggan }}</td>
                                <td class="py-4 px-4 text-sm text-quaternary text-center font-helvetica">{{ $pelanggan->alamat }}</td>
                                <td class="py-4 px-4 text-sm text-quaternary text-center font-helvetica">{{ $pelanggan->telepon }}</td>
                                <td class="py-4 px-4 text-sm text-quaternary text-center font-helvetica">
                                    <button type="button" 
                                            class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md mr-2 btnEdit font-poppins"
                                            data-id="{{ $pelanggan->id_pelanggan }}"
                                            data-nama="{{ $pelanggan->nama_pelanggan }}"
                                            data-alamat="{{ $pelanggan->alamat }}"
                                            data-telepon="{{ $pelanggan->telepon }}">
                                        Edit
                                    </button>
                                    <button type="button" 
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md btnDelete font-poppins"
                                            data-id="{{ $pelanggan->id_pelanggan }}">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $pelanggans->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </main>

        @push('scripts')
        <script>
            $(document).ready(function() {
                setupAjaxCsrf();
                
                $('.btnEdit').on('click', handleEdit);
                $('.btnDelete').on('click', handleDelete);
                $('#btnBaru').on('click', handleTambahBaru);
                $('#btnHapusForm').on('click', handleKosongkanForm);

                function setupAjaxCsrf() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                }

                function handleEdit() {
                    var id = $(this).data('id');
                    fetchAndFillForm(id);
                }

                function handleDelete() {
                    var id = $(this).data('id');
                    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                        deletePelanggan(id);
                    }
                }

                function handleTambahBaru() {
                    resetForm();
                    setupFormForCreate();
                }

                function handleKosongkanForm() {
                    resetForm();
                }

                function fetchAndFillForm(id) {
                    $.ajax({
                        url: "{{ url('/pelanggan') }}/" + id + "/edit",
                        type: 'GET',
                        success: function(response) {
                            fillFormWithData(response);
                            setupFormForEdit(id);
                            scrollToForm();
                        },
                        error: function() {
                            alert('Gagal mengambil data pelanggan');
                        }
                    });
                }

                function fillFormWithData(data) {
                    $('#id_pelanggan').val(data.id_pelanggan);
                    $('#nama_pelanggan').val(data.nama_pelanggan);
                    $('#alamat').val(data.alamat);
                    $('#telepon').val(data.telepon);
                }

                function setupFormForEdit(id) {
                    $('#btnHapus').addClass('hidden');
                    $('#btnBaru').addClass('hidden');
                    $('#method').val('PUT');
                    $('#pelangganForm').attr('action', "{{ url('/pelanggan') }}/" + id);
                    $('#btnSimpan').text('Update');
                }

                function setupFormForCreate() {
                    $('#btnHapus').addClass('hidden');
                    $('#btnBaru').removeClass('hidden');
                    $('#method').val('POST');
                    $('#pelangganForm').attr('action', '{{ route("pelanggan.store") }}');
                    $('#btnSimpan').text('Simpan');
                }

                function resetForm() {
                    $('#pelangganForm')[0].reset();
                    $('#id_pelanggan').val('{{ $nextId }}');
                }

                function deletePelanggan(id) {
                    $.ajax({
                        url: "{{ url('/pelanggan') }}/" + id,
                        type: 'DELETE',
                        data: { _token: '{{ csrf_token() }}' },
                        success: function() { location.reload(); },
                        error: function() { alert('Sukses Menghapus Data Pelanggan, Silahkan Refresh Halaman!'); }
                    });
                }

                function scrollToForm() {
                    $('html, body').animate({
                        scrollTop: $("#pelangganForm").offset().top - 100
                    }, 500);
                }
            });
        </script>
        @endpush
@endsection
