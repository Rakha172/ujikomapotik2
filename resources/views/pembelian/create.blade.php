@extends('adminlte::page') 
@section('title', 'Tambah Pembelian') 
@section('content_header') 
    <h1 class="m-0 text-dark">Tambah Pembelian</h1>
@stop
@section('content') 
    <form action="{{route('pembelian.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputnonota_beli">Nomor Nota Beli</label>
                        <input type="number" class="form-control @error('nonota_beli') is-invalid @enderror" id="exampleInputnonota_beli"
                    placeholder="Nomor Nota Beli" name="nonota_beli"
                    value="{{old('nonota_beli')}}"> @error('Nomor Nota Beli') <span class="text-danger">{{$message}}</span> @enderror
                </div> 

                    <div class="form-group">
                    <label for="exampleInputtgl_beli">Tanggal Beli</label>
                        <input type="date" class="form-control @error('tgl_beli') is-invalid @enderror" id="exampleInputtgl_beli"
                    placeholder="Tanggal Beli" name="tgl_beli"
                    value="{{old('tgl_beli')}}"> @error('Tanggal Beli') <span class="text-danger">{{$message}}</span> @enderror
                </div>

                    <div class="form-group">
                    <label for="exampleInputtotal_beli">Total Beli</label>
                        <input type="number" class="form-control @error('total_beli') is-invalid @enderror" id="exampleInputtotal_beli"
                    placeholder="Total Beli" name="total_beli"
                    value="{{old('total_beli')}}"> @error('Total Beli') <span class="text-danger">{{$message}}</span> @enderror
                </div>

                    <div class="form-group">
                    <label for="exampleInputid_user">Id User</label>
                    <div class="input-group">
                        <input type="hidden" name="id_user" id="id_user" value="{{old('id_user')}}">
                        <input type="text" class="form-control @error('users') is-invalid @enderror" 
                    placeholder="Users" id="users" name="users"
                    value="{{old('users')}}" aria-label="Users" aria-describedby="cari"
                    readonly>
                <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                     data-bs-target="#staticBackdrop"></i> Cari Data User</button>
                </div>

                    <div class="form-group">
                    <label for="exampleInputid_distributor">Id Distributor</label>
                    <div class="input-group">
                        <input type="hidden" name="id_distributor" id="id_distributor" value="{{old('id_distributor')}}">
                        <input type="text" class="form-control @error('distributor') is-invalid @enderror" 
                    placeholder="Distributor" id="distributor" name="distributor"
                    value="{{old('distributor')}}" aria-label="Distributor" aria-describedby="cari"
                    readonly>
                <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                        data-bs-target="#staticBackdrop1"></i> Cari Data Distributor</button>
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
                                                                                    <!-- End Modal -->

                <div class="card-footer">
                <a href="{{route('detail_pembelian.create')}}"> <button type="submit" class="btn btn-
primary">Simpan dan lagi</button>
                    <a href="{{route('pembelian.index')}}" class="btn 
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

 //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Distributor dari Modal ke form tambah
 function pilih1(id, distributor){
 document.getElementById('id_distributor').value = id
 document.getElementById('distributor').value = distributor
 } 
 </script> 
@endpush