@extends('layouts.app')

@section('content')

<div class="section-header">
    <h1>Laporan Barang Masuk</h1>
    <div class="ml-auto">
        <a href="javascript:void(0)" class="btn btn-danger" id="print-barang-masuk"><i class="fa fa-sharp fa-light fa-print"></i> Print PDF</a>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <form id="filter_form" action="/laporan-barang-masuk/get-data" method="GET">
                        <div class="row">
                            <div class="col-md-5">
                                <label>Pilih Tanggal Mulai :</label>
                                <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai">
                            </div>
                            <div class="col-md-5">
                                <label>Pilih Tanggal Selesai :</label>
                                <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai">
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="button" id="btn_filter" class="btn btn-primary">Filter</button>
                                <button type="button" class="btn btn-danger" id="refresh_btn">Refresh</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Transaksi</th>
                                <th>Tanggal Masuk</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Masuk</th>
                                <th>Supplier</th>
                            </tr>
                        </thead>
                        <tbody id="tabel-laporan-barang-masuk">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var table = $('#table_id').DataTable({ paging: true });

        loadData(); // Panggil saat halaman dimuat

        $('#filter_form').submit(function(event) {
            event.preventDefault();
            loadData();
        });

        $('#btn_filter').on('click', function(event) {
            event.preventDefault();
            loadData();
        });

        $('#refresh_btn').on('click', function() {
            $('#filter_form')[0].reset();
            loadData();
        });

        function loadData() {
            var tanggalMulai = $('#tanggal_mulai').val();
            var tanggalSelesai = $('#tanggal_selesai').val();

            $.ajax({
                url: '/laporan-barang-masuk/get-data',
                type: 'GET',
                dataType: 'json',
                data: {
                    tanggal_mulai: tanggalMulai,
                    tanggal_selesai: tanggalSelesai
                },
                success: function(response) {
                    table.clear().draw();

                    if (response.length > 0) {
                        $.each(response, function(index, item) {
                            var row = [
                                (index + 1),
                                item.kode_transaksi,
                                item.tanggal_masuk,
                                item.nama_barang,
                                item.jumlah_masuk,
                                item.supplier // langsung dari response
                            ];
                            table.row.add(row).draw(false);
                        });
                        table.draw(); // redraw sekali di akhir
                    } else {
                        table.row.add(['', 'Tidak ada data', '', '', '', '']).draw();
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                    alert('Gagal mengambil data. Periksa console.');
                }
            });
        }

        // Print PDF
        $('#print-barang-masuk').on('click', function() {
            var tanggalMulai = $('#tanggal_mulai').val();
            var tanggalSelesai = $('#tanggal_selesai').val();

            var url = '/laporan-barang-masuk/print-barang-masuk';

            if (tanggalMulai && tanggalSelesai) {
                url += '?tanggal_mulai=' + tanggalMulai + '&tanggal_selesai=' + tanggalSelesai;
            }

            window.location.href = url;
        });
    });
</script>
@endsection