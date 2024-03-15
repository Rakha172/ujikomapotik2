<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    public function laporan(Request $request)
    {
       $tanggal = $request->input('tgl_jual');

        // if ($request->start && $request->end && $request->status) {
            $penjualan = Penjualan::where('tgl_jual',   $tanggal )->get();
        // } elseif ($request->start && $request->end) {
        //     $penjualan = Penjualan::whereBetween('tgl_jual', [$request->start, $request->end])->get();
        // } elseif ($request->status) {
        //     $penjualan = Penjualan::where('nonota_jual', $request->status)->get();
        // } else {
        //     $penjualan = Penjualan::get();
        // }
        return view('laporan', [
            'penjualan' => $penjualan,
        ]);
    }
    
    public function downloadpdf()
    {
        $penjualan = Penjualan::limit(20)->get();
        $pdf = PDF::loadView('laporan-pdf', compact('penjualan'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('laporan-pdf');
    }

}