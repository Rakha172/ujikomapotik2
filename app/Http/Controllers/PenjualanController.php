<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
   {
    //Menampilkan Semua Data Penjualan
    $penjualan = Penjualan ::all();
    return view('penjualan.index', [ 
        'penjualan' => $penjualan
    ]);
   } 

    public function create()
    {
        return view(
            'penjualan.create',[
                'users' => User::all(),
            ]);
   } 

    public function store(Request $request)
 { 
    //Menyimpan Data penjualan Baru
    $request->validate([
        'nonota_jual' => 'required',
        'tgl_jual' => 'required',
        'total_jual' => 'required',
        'id_user' => 'required'
        
    ]);
    $array = $request->only([
        'nonota_jual','tgl_jual','total_jual','id_user'
    ]);
    Penjualan::create($array);
    return redirect()->route('detail_penjualan.create')->with('success_message', 'Berhasil Menambah penjualan Baru');
 } 
 
    public function edit($id)
   { 
    //Menampilkan Form Edit
     $penjualan = Penjualan::find($id);
    if (!$penjualan) return redirect()->route('penjualan.index') 
    ->with('error_message', 'penjualan dengan id = '.$id.' tidak ditemukan');
    return view('penjualan.edit', [ 
        'penjualan' => $penjualan,
        'users' => User::all()
]);
 } 

    public function update(Request $request, $id)
 { 
    //Mengedit Penjualan User
    $request->validate([
        'nonota_jual' => 'required',
        'tgl_jual' => 'required',
        'total_jual' => 'required',
        'id_user' => 'required'

 ]);
   $penjualan = Penjualan::find($id);
   $penjualan->nonota_jual = $request->nonota_jual;
   $penjualan->tgl_jual = $request->tgl_jual;
   $penjualan->total_jual = $request->total_jual;
   $penjualan->id_user = $request->id_user;
   $penjualan->save();
    return redirect()->route('penjualan.index') 
    ->with('success_message', 'Berhasil Mengubah penjualan');
 } 

    public function destroy($id)
 { 
    //Menghapus Penjualan
    $penjualan = Penjualan::find($id);
    if ($penjualan) $penjualan->delete();
     return redirect()->route('penjualan.index') 
    ->with('success_message', 'Berhasil Menghapus penjualan');
 } 
}