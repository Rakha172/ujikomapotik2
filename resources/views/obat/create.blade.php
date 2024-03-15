@extends('adminlte::page') 
@section('title', 'Tambah Obat') 
@section('content_header') 
    <h1 class="m-0 text-dark">Tambah Obat</h1>
@stop
@section('content') 
    <form action="{{route('obat.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputkode_obat">Kode Obat</label>
                        <input type="text" class="form-control @error('kode_obat') is-invalid @enderror" id="exampleInputkode_obat"
                    placeholder="Kode Obat" name="kode_obat"
                    value="{{old('kode_obat')}}"> @error('Kode Obat') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 

                    <div class="form-group">
                    <label for="exampleInputnama_obat">Nama Obat</label>
                        <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" id="exampleInputnama_obat"
                    placeholder="Masukkan Nama Obat" name="nama_obat"
                    value="{{old('nama_obat')}}"> @error('Nama Obat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleInputmerk">Merk Obat</label>
                        <input type="text" class="form-control @error('merk') is-invalid @enderror" id="exampleInputmerk"
                    placeholder="Merk Obat" name="merk"
                    value="{{old('merk')}}"> @error('Merk Obat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleInputjenis">Jenis Obat</label>
                        <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="exampleInputjenis"
                    placeholder="Jenis Obat" name="jenis"
                    value="{{old('jenis')}}"> @error('Jenis Obat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleInputsatuan">Satuan Obat</label>
                        <input type="text" class="form-control @error('satuan') is-invalid @enderror" id="exampleInputsatuan"
                    placeholder="Satuan Obat" name="satuan"
                    value="{{old('satuan')}}"> @error('Satuan Obat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleInputgolongan">Golongan Obat</label>
                        <input type="text" class="form-control @error('golongan') is-invalid @enderror" id="exampleInputgolongan"
                    placeholder="Golongan Obat" name="golongan"
                    value="{{old('golongan')}}"> @error('Golongan Obat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleInputkemasan">Kemasan Obat</label>
                        <input type="text" class="form-control @error('kemasan') is-invalid @enderror" id="exampleInputkemasan"
                    placeholder="Kemasan Obat" name="kemasan"
                    value="{{old('kemasan')}}"> @error('Kemasan Obat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleInputharga_jual">Harga Jual Obat</label>
                        <input type="text" class="form-control @error('harga_jual') is-invalid @enderror" id="exampleInputharga_jual"
                    placeholder="Harga Jual Obat" name="harga_jual"
                    value="{{old('harga_jual')}}"> @error('Harga Jual Obat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleInputstok">Stok Obat</label>
                        <input type="text" class="form-control @error('stok') is-invalid @enderror" id="exampleInputstok"
                    placeholder="Stok Obat" name="stok"
                    value="{{old('stok')}}"> @error('Stok Obat') <span class="text-danger">{{$message}}</span> @enderror  
                </div>
                
                <div class="card-footer">
                     <button type="submit" class="btn btn-primary">
                     Simpan
                    </button>
                    <a href="{{route('obat.index')}}" class="btn 
btn-danger">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop