<?php

namespace App\Http\Controllers;

use App\Models\Detail_Pembelian;
use App\Models\Pembelian;
use App\Models\Obat;
use Illuminate\Http\Request;

class Detail_PembelianController extends Controller
{
    public function index()
   {
    //Menampilkan Semua Data Detail_Pembelian
    $detail_pembelian = Detail_Pembelian ::all();
    return view('detail_pembelian.index', [ 
        'detail_pembelian' => $detail_pembelian
    ]);
   } 

    public function create()
    {
        return view(
            'detail_pembelian.create',[
                'pembelian' => Pembelian::all(),
                'obat' => Obat::all()
            ]);
   } 

   public function store(Request $request)
//  { 
//     //Menyimpan Data Detail_Pembelian Baru
//     $request->validate([
//         'id_pembelian' => 'required',
//         'tgl_kadaluarsa' => 'required',
//         'harga_beli' => 'required',
//         'jumlah_beli' => 'required',
//         'sub_total_beli' => 'required',
//         'persen_margin_jual' => 'required',
//         'id_obat' => 'required'
        
//     ]);
//     $array = $request->only([
//         'id_pembelian','tgl_kadaluarsa','harga_beli','jumlah_beli','sub_total_beli','persen_margin_jual',
//         'id_obat'
//     ]);
//     Detail_Pembelian::create($array);
//     return redirect()->route('detail_pembelian.index')->with('success_message', 'Berhasil Menambah Detail_Pembelian Baru');
  
 {
    $request->validate([
        'id_pembelian' => 'required',
        'tgl_kadaluarsa' => 'required',
        'harga_beli' => 'required',
        'jumlah_beli' => 'required',
        'persen_margin_jual' => 'required',
        'id_obat' => 'required'
    ]);

    $data = $request->only([
        'id_pembelian', 'tgl_kadaluarsa', 'harga_beli', 'jumlah_beli', 'persen_margin_jual', 'id_obat'
    ]);

    $sub_total_beli = $request->input('harga_beli') * $request->input('jumlah_beli');
    $data['sub_total_beli'] = $sub_total_beli;

    // Lakukan perhitungan lainnya jika ada

    detail_pembelian::create($data);

    return redirect()->route('detail_pembelian.index')->with('success_message', 'Berhasil menambah Detail Pembelian Baru');
}
 
    public function edit($id)
   { 
    //Menampilkan Form Edit
     $detail_pembelian = Detail_Pembelian::find($id);
    if (!$detail_pembelian) return redirect()->route('detail_pembelian.index') 
    ->with('error_message', 'detail_pembelian dengan id = '.$id.' tidak ditemukan');
    return view('detail_pembelian.edit', [ 
        'detail_pembelian' => $detail_pembelian,
        'pembelian' => Pembelian::all(),
        'obat' => Obat::all()
]);
 } 

    public function update(Request $request, $id)
 { 
    //Mengedit Detail_Pembelian User
    $request->validate([
        'id_pembelian' => 'required',
        'tgl_kadaluarsa' => 'required',
        'harga_beli' => 'required',
        'jumlah_beli' => 'required',
        'sub_total_beli' => 'required',
        'persen_margin_jual' => 'required',
        'id_obat' => 'required'
 ]);
   $detail_pembelian = Detail_Pembelian::find($id);
   $detail_pembelian->id_pembelian = $request->id_pembelian;
   $detail_pembelian->tgl_kadaluarsa = $request->tgl_kadaluarsa;
   $detail_pembelian->harga_beli = $request->harga_beli;
   $detail_pembelian->jumlah_beli = $request->jumlah_beli;
   $detail_pembelian->sub_total_beli = $request->sub_total_beli;
   $detail_pembelian->persen_margin_jual = $request->persen_margin_jual;
   $detail_pembelian->id_obat = $request->id_obat;
   $detail_pembelian->save();
    return redirect()->route('detail_pembelian.index') 
    ->with('success_message', 'Berhasil Mengubah Detail_Pembelian');
 } 

    public function destroy($id)
 { 
    //Menghapus Detail_Pembelian
    $detail_pembelian = Detail_Pembelian::find($id);
    if ($detail_pembelian) $detail_pembelian->delete();
     return redirect()->route('detail_pembelian.index') 
    ->with('success_message', 'Berhasil Menghapus Detail_Pembelian');
 } 
}