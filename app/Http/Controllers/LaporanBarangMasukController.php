<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Supplier;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanBarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('laporan-barang-masuk.index');
    }

    /**
     * Get Data for DataTable (returns JSON)
     */
    public function getData(Request $request)
    {
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');

        $query = BarangMasuk::with('supplier');

        if ($tanggalMulai && $tanggalSelesai) {
            $query->whereBetween('tanggal_masuk', [$tanggalMulai, $tanggalSelesai]);
        }

        $data = $query->get()->map(function ($item) {
            return [
                'kode_transaksi' => $item->kode_transaksi,
                'tanggal_masuk'  => $item->tanggal_masuk,
                'nama_barang'    => $item->nama_barang,
                'jumlah_masuk'   => $item->jumlah_masuk,
                'supplier'       => $item->supplier ? $item->supplier->supplier : '',
            ];
        });

        return response()->json($data);
    }

    /**
     * Print PDF (using Dompdf)
     */
    public function printBarangMasuk(Request $request)
    {
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');

        $query = BarangMasuk::with('supplier');

        if ($tanggalMulai && $tanggalSelesai) {
            $query->whereBetween('tanggal_masuk', [$tanggalMulai, $tanggalSelesai]);
        }

        // Ambil data sebagai collection of objects (dengan relasi)
        $data = $query->get();

        // Generate PDF
        $dompdf = new Dompdf();
        $html = view('laporan-barang-masuk.print-barang-masuk', compact('data', 'tanggalMulai', 'tanggalSelesai'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('print-barang-masuk.pdf', ['Attachment' => false]);
    }
}