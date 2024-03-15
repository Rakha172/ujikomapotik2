@extends('adminlte::page') 
@section('title', 'Tambah Detail_Penjualan') 
@section('content_header') 
    <h1 class="m-0 text-dark">Tambah Detail_Penjualan</h1>
@stop
@section('content') 
    <form action="{{route('detail_penjualan.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="form-group">
                        <label for="nonota_jual">Nomor Nota Jual</label>
                        <div class="input-group">
                            <input type="hidden" name="id_penjualan" id="id_penjualan"
                                value="{{ old('id_penjualan') }}">
                            <input type="text" class="form-control @error('nonota_jual') is-invalid @enderror"
                                placeholder="Nomor Nota Jual" id="nonota_jual" name="nonota_jual"
                                value="{{ old('nonota_jual') }}" aria-label="Nomor Nota Jual" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop1"></i>Cari Nomor Nota Jual</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="id_obat">Id Obat</label>
                        <div class="input-group">
                            <input type="hidden" name="id_obat" id="id_obat" value="{{ old('id_obat') }}">
                            <input type="text" class="form-control @error('nama_obat') is-invalid @enderror"
                                placeholder="Nama Obat" id="nama_obat" name="nama_obat" value="{{ old('nama_obat') }}"
                                aria-label="Nama Distributor" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop2"></i>Cari Obat</button>
                        </div>
                    
                    <div class="form-group">
                    <label for="exampleInputjumlah_jual">Jumlah Jual</label>
                        <input type="number" class="form-control @error('jumlah_jual') is-invalid @enderror" id="exampleInputjumlah_jual"
                    placeholder="jumlah_jual" name="jumlah_jual"
                    value="{{old('jumlah_jual')}}"> @error('jumlah_jual') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleInputharga_jual">Harga Jual</label>
                        <input type="number" class="form-control @error('harga_jual') is-invalid @enderror" id="exampleInputharga_jual"
                    placeholder="Harga Jual" name="harga_jual"
                    value="{{old('harga_jual')}}"> @error('harga_jual') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleInputsub_total_jual">Sub Total Jual</label>
                        <input type="number" class="form-control @error('sub_total_jual') is-invalid @enderror" id="exampleInputsub_total_jual"
                    placeholder="Sub Total Jual" name="sub_total_jual"
                    value="{{old('sub_total_jual')}}"> @error('sub_total_jual') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                
                    <div class="card-footer">
                     <button type="submit" class="btn btn-
primary">Simpan</button>
                    <a href="{{route('detail_penjualan.index')}}" class="btn 
btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
     <!-- Modal -->
     <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Nota Jual</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover table-bordered table-stripped" id="example1">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nomor Nota Jual</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penjualan as $key => $penjualan)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td id={{$key+1}}>{{ $penjualan->nonota_jual }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs"
                                                onclick="pilih1('{{ $penjualan->id }}', '{{ $penjualan->nonota_jual }}')"
                                                data-bs-dismiss="modal">Pilih</button>
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

             <!-- Modal -->
             <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Obat</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover table-bordered table-stripped" id="example2">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Obat</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($obat as $key => $obat)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $obat->nama_obat }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs"
                                                onclick="pilih2('{{ $obat->id }}', '{{ $obat->nama_obat }}')"
                                                data-bs-dismiss="modal">Pilih</button>
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
@stop
@push('js')
            <script>
                $('#example1').DataTable({
                    "responsive": true,
                });

                function pilih1(id, nonota_jual) {
                    document.getElementById('id_penjualan').value = id
                    document.getElementById('nonota_jual').value = nonota_jual
                }

            </script>
            <script>
                $('#example2').DataTable({
                    "responsive": true,
                });

                function pilih2(id, nama_obat) {
                    document.getElementById('id_obat').value = id
                    document.getElementById('nama_obat').value = nama_obat
                }

            </script>
            @endpush