@extends('adminlte::page') 
@section('title', 'Edit Distributor') 
@section('content_header') 
    <h1 class="m-0 text-dark">Edit Distributor</h1>
@stop
@section('content') 
    <form action="{{route('distributor.update', $distributor)}}" method="post">
        @method('PUT') 
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
 
                <div class="form-group">
                        <label for="exampleInputnama_distributor">Nama Distributor</label>
                        <input type="nama_distributor" class="form-control 
@error('nama_distributor') is-invalid @enderror" id="exampleInputNama Distributor"
placeholder="Nama Distributor" name="nama distributor" value="{{$distributor->nama_distributor ??
old('nama_distributor')}}">
                        @error('nama_distributor') <span class="text-
danger">{{$message}}</span> @enderror
                    </div>
                   <div class="form-group">
                        <label for="exampleInputalamat">Alamat Lengkap</label>
                        <input type="alamat" class="form-control 
@error('alamat') is-invalid @enderror" id="exampleInputAlamat Lengkap"
placeholder="Alamat Lengkap" name="alamat" value="{{$distributor->alamat ??
old('alamat')}}">
                        @error('alamat') <span class="text-
danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputnotelepon">Nomor Telepon</label>
                        <input type="notelepon" class="form-control 
@error('notelepon') is-invalid @enderror" id="exampleInputNomor Telepon"
placeholder="Nomor Telepon" name="notelepon" value="{{$distributor->notelepon ??
old('notelepon')}}">
                        @error('notelepon') <span class="text-
danger">{{$message}}</span> @enderror
                    </div>
                   
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-
secondary">Simpan</button>
                    <a href="{{route('distributor.index')}}" class="btn 
btn-secondary">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop