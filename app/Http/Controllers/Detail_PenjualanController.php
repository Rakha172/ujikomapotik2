<?php

namespace App\Http\Controllers;

use App\Models\Detail_Penjualan;
use App\Models\Penjualan;
use App\Models\Obat;
use Illuminate\Http\Request;

class Detail_PenjualanController extends Controller
{
    public function index()
   {
    //Menampilkan Semua Data Detail_Penjualan
    $detail_penjualan = Detail_Penjualan ::all();
    return view('detail_penjualan.index', [ 
        'detail_penjualan' => $detail_penjualan
    ]);
   } 

    public function create()
    {
        return view(
            'detail_penjualan.create',[
                'penjualan' => Penjualan::all(),
                'obat' => Obat::all()
            ]);
   } 

    public function store(Request $request)
 { 
    //Menyimpan Data Detail_Penjualan Baru
    $request->validate([
        'id_penjualan' => 'required',
        'jumlah_jual' => 'required',
        'harga_jual' => 'required',
        'sub_total_jual' => 'required',
        'id_obat' => 'required'
        
    ]);
    $array = $request->only([
        'id_penjualan','jumlah_jual','harga_jual','sub_total_jual','id_obat'
    ]);
    Detail_Penjualan::create($array);
    return redirect()->route('detail_penjualan.index')->with('success_message', 'Berhasil Menambah Detail_Penjualan Baru');
 } 
 
    public function edit($id)
   { 
    //Menampilkan Form Edit
     $detail_penjualan = Detail_Penjualan::find($id);
    if (!$detail_penjualan) return redirect()->route('detail_penjualan.index') 
    ->with('error_message', 'detail_penjualan dengan id = '.$id.' tidak ditemukan');
    return view('detail_penjualan.edit', [ 
        'detail_penjualan' => $detail_penjualan,
        'penjualan' => Penjualan::all(),
        'obat' => Obat::all()
]);
 } 

    public function update(Request $request, $id)
 { 
    //Mengedit Detail_Penjualan User
    $request->validate([
        'id_penjualan' => 'required',
        'jumlah_jual' => 'required',
        'harga_jual' => 'required',
        'sub_total_jual' => 'required',
        'id_obat' => 'required'

 ]);
   $detail_penjualan = Detail_Penjualan::find($id);
   $detail_penjualan->id_penjualan = $request->id_penjualan;
   $detail_penjualan->jumlah_jual = $request->jumlah_jual;
   $detail_penjualan->harga_jual = $request->harga_jual;
   $detail_penjualan->sub_total_jual = $request->sub_total_jual;
   $detail_penjualan->id_obat = $request->id_obat;
   $detail_penjualan->save();
    return redirect()->route('detail_penjualan.index') 
    ->with('success_message', 'Berhasil Mengubah Detail_Penjualan');
 } 

    public function destroy($id)
 { 
    //Menghapus Detail_Penjualan
    $detail_penjualan = Detail_Penjualan::find($id);
    if ($detail_penjualan) $detail_penjualan->delete();
     return redirect()->route('detail_penjualan.index') 
    ->with('success_message', 'Berhasil Menghapus Detail_Penjualan');
 } 
}