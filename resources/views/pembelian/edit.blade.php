@extends('adminlte::page') 
@section('title', 'Edit Pembelian') 
@section('content_header') 
    <h1 class="m-0 text-dark">Edit Pembelian</h1>
@stop
@section('content') 
    <form action="{{route('pembelian.update', $pembelian)}}" method="post">
        @method('PUT') 
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
 
                <div class="form-group">
                    <label for="exampleInputnonota_beli">Nomor Nota Beli</label>
                    <input type="number" class="form-control @error('nonota_beli') is-invalid @enderror" id="exampleInputNomor Nota Beli"
                placeholder="Nomor Nota Beli" name="nonota_beli" value="{{$pembelian->nonota_beli ?? old('nonota_beli')}}">
                    @error('nonota_beli') <span class="text-danger">{{$message}}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputtgl_beli">Tanggal Beli</label>
                    <input type="date" class="form-control @error('tgl_beli') is-invalid @enderror" id="exampleInputTanggal Beli"
                placeholder="Tanggal Beli" name="tgl_beli" value="{{$pembelian->tgl_beli ?? old('tgl_beli')}}">
                    @error('tgl_beli') <span class="text-danger">{{$message}}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputtotal_beli">Total Beli</label>
                    <input type="number" class="form-control @error('total_beli') is-invalid @enderror" id="exampleInputTotal Beli"
                placeholder="Total Beli" name="total_beli" value="{{$pembelian->total_beli ?? old('total_beli')}}">
                    @error('total_beli') <span class="text-danger">{{$message}}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputid_distributor">Id Distributor</label>
                    <div class="input-group">
                        <input type="hidden" name="id_distributor" id="id_distributor" value="{{$pembelian->fdistributor->id ??old('id_distributor')}}">
                        <input type="text" class="form-control @error('distributor') is-invalid @enderror" 
                    placeholder="Distributor" id="distributor" name="distributor"
                    value="{{$pembelian->fdistributor->nama_distributor ??old('distributor')}}" aria-label="Distributor" aria-describedby="cari"
                    readonly>
                <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                        data-bs-target="#staticBackdrop1"></i> Cari Data Distributor</button>
                    </div>

                    <div class="form-group">
                    <label for="exampleInputid_user">Id User</label>
                    <div class="input-group">
                        <input type="hidden" name="id_user" id="id_user" value="{{$pembelian->fuser->id ??old('id_user')}}">
                        <input type="text" class="form-control @error('users') is-invalid @enderror" 
                    placeholder="Users" id="users" name="users"
                    value="{{$pembelian->fuser->name ??old('users')}}" aria-label="Users" aria-describedby="cari"
                    readonly>
                <button class="btn btn-success" type="button" data-bs-toggle="modal" id="cari"
                     data-bs-target="#staticBackdrop"></i> Cari Data User</button>
                </div>

                 <!-- Modal -->
                 <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5"id="staticBackdropLabel">Pencarian Data Distributor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <table class="table table-hover table-bordered table-stripped" id="example3">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Distributor</th>
                                                <th>Alamat</th>
                                                <th>Notelepon</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($distributor as $key => $dis)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td id={{$key+1}}>{{$dis->nama_distributor}}</td>
                                                <td id={{$key+1}}>{{$dis->alamat}}</td>
                                                <td id={{$key+1}}>{{$dis->notelepon}}</td>
                                                

                                                <td>
                                                <button type="button" class="btn  btn-danger 
    btn-xs" onclick="pilih1('{{$dis->id}}',  '{{$dis->nama_distributor}}', '{{$dis->alamat}}', '{{$dis->notelepon}}')"  data-bs-dismiss="modal">
                                                            Pilih
                                                        </button>
                                                                                            </td>
                                                                                        </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                    </table>
                                                                                    </div>
                                                                                    </div>
                                                                                    </div>
                                                                                    </div>

                  <!-- Modal -->
                  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5"id="staticBackdropLabel">Pencarian Data Users</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Level</th>
                                                <th>Aktif</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $key => $user)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td id={{$key+1}}>{{$user->name}}</td>
                                                <td id={{$key+1}}>{{$user->email}}</td>
                                                <td id={{$key+1}}>{{$user->level}}</td>
                                                <td id={{$key+1}}>{{$user->aktif}}</td>
                                               
                                            <td>
                                                <button type="button" class="btn btn-primary btn-xs"
                                                onclick="pilih('{{$user->id}}',  '{{$user->name}}')" data-bs-dismiss="modal">
                                                    Pilih
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                    </div>
                                    </div>
                                    </div>
                                    </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-
primary">Simpan</button>
                    <a href="{{route('pembelian.index')}}" class="btn 
btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    @stop
@push('js')
<script> 
 //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Users dari Modal ke form tambah
 function pilih(id, user){
 document.getElementById('id_user').value = id
 document.getElementById('users').value = user
 } 

 //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Distributor dari Modal ke form tambah
 function pilih1(id, distributor){
 document.getElementById('id_distributor').value = id
 document.getElementById('distributor').value = distributor
 } 
 </script> 
@endpush