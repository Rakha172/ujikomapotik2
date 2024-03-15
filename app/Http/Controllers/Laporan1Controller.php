<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;
use PDF;

class Laporan1Controller extends Controller
{
    public function laporan1(Request $request)
    {
        $tanggal = $request->input('tgl_beli');
        // if ($request->start && $request->end && $request->status) {
            $pembelian = Pembelian::where('tgl_beli', $tanggal)->get();
        //     $pembelian = Pembelian::whereBetween('tgl_beli', [$request->start, $request->end])
        //         ->where('nonota_beli', $request->status)
        //         ->get();
        // } elseif ($request->start && $request->end) {
        //     $pembelian = Pembelian::whereBetween('tgl_beli', [$request->start, $request->end])->get();
        // } elseif ($request->status) {
        //     $pembelian = Pembelian::where('nonota_beli', $request->status)->get();
        // } else {
        //     $pembelian = Pembelian::get();
        // }
        return view('laporan1', [
            'pembelian' => $pembelian,
        ]);
    }

    public function downloadpdf()
    {
        $pembelian = Pembelian::limit(20)->get();
        $pdf = PDF::loadView('laporan1-pdf', compact('pembelian'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('laporan1-pdf');
    }

}