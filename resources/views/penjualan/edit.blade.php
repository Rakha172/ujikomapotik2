@extends('adminlte::page') 
@section('title', 'Edit Penjualan') 
@section('content_header') 
    <h1 class="m-0 text-dark">Edit Penjualan</h1>
@stop
@section('content') 
    <form action="{{route('penjualan.update', $penjualan)}}" method="post">
        @method('PUT') 
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputid_user">Id User</label>
                    <div class="input-group">
                        <input type="hidden" name="id_user" id="id_user" value="{{$penjualan->fuser->id ??old('id_user')}}">
                        <input type="text" class="form-control @error('users') is-invalid @enderror" 
                    placeholder="Users" id="users" name="users"
                    value="{{$penjualan->fuser->name ??old('users')}}" aria-label="Users" aria-describedby="cari"
                    readonly>
                <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                     data-bs-target="#staticBackdrop"></i> Cari Data User</button>
                </div>

                    <div class="form-group">
                    <label for="exampleInputnonota_jual">Nomor Nota Jual</label>
                        <input type="number" class="form-control @error('nonota_jual') is-invalid @enderror" id="exampleInputnonota_jual"
                    placeholder="Nomor Nota Jual" name="nonota_jual"
                    value="{{$penjualan->nonota_jual ??old('nonota_jual')}}"> @error('Nomor Nota Jual') <span class="text-danger">{{$message}}</span> @enderror
                </div>

                    <div class="form-group">
                    <label for="exampleInputtgl_jual">Tanggal Jual</label>
                        <input type="date" class="form-control @error('tgl_jual') is-invalid @enderror" id="exampleInputtgl_jual"
                    placeholder="Tanggal Jual" name="tgl_jual"
                    value="{{$penjualan->tgl_jual ??old('tgl_jual')}}"> @error('Tanggal Jual') <span class="text-danger">{{$message}}</span> @enderror
                </div>

                    <div class="form-group">
                    <label for="exampleInputtotal_jual">Total Jual</label>
                        <input type="number" class="form-control @error('total_jual') is-invalid @enderror" id="exampleInputtotal_jual"
                    placeholder="Total Jual" name="total_jual"
                    value="{{$penjualan->total_jual ??old('total_jual')}}"> @error('Total Jual') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                </div>
            </div>
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
                                    <!-- End Modal -->

                <div class="card-footer">
                     <button type="submit" class="btn btn-
primary">Simpan</button>
                    <a href="{{route('penjualan.index')}}" class="btn 
btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
<script> 
 //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Users dari Modal ke form tambah
 function pilih(id, user){
 document.getElementById('id_user').value = id
 document.getElementById('users').value = user
 } 

 </script> 
@endpush