<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Customer;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanBarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('laporan-barang-keluar.index');
    }

    /**
     * Get Data with customer name
     */
    public function getData(Request $request)
    {
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');

        $query = BarangKeluar::with('customer');

        if ($tanggalMulai && $tanggalSelesai) {
            $query->whereBetween('tanggal_keluar', [$tanggalMulai, $tanggalSelesai]);
        }

        $data = $query->get()->map(function ($item) {
            return [
                'kode_transaksi' => $item->kode_transaksi,
                'tanggal_keluar' => $item->tanggal_keluar,
                'nama_barang'    => $item->nama_barang,
                'jumlah_keluar'  => $item->jumlah_keluar,
                'customer'       => $item->customer ? $item->customer->customer : '',
            ];
        });

        return response()->json($data);
    }

    /**
     * Print DomPDF
     */
    public function printBarangKeluar(Request $request)
    {
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');

        $query = BarangKeluar::with('customer');

        if ($tanggalMulai && $tanggalSelesai) {
            $query->whereBetween('tanggal_keluar', [$tanggalMulai, $tanggalSelesai]);
        }

        $data = $query->get(); // collection of objects with relation

        $dompdf = new Dompdf();
        $html = view('laporan-barang-keluar.print-barang-keluar', compact('data', 'tanggalMulai', 'tanggalSelesai'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('print-barang-keluar.pdf', ['Attachment' => false]);
    }

    /**
     * Get Customer (optional, jika masih butuh untuk API)
     */
    public function getCustomer()
    {
        $customer = Customer::all();
        return response()->json($customer);
    }
}