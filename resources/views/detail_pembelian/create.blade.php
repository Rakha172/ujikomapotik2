@extends('adminlte::page') 
@section('title', 'Tambah Detail_Pembelian') 
@section('content_header') 
    <h1 class="m-0 text-dark">Tambah Detail_Pembelian</h1>
@stop
@section('content') 
    <form action="{{route('detail_pembelian.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="form-group">
                        <label for="nonota_beli">Nomor Nota Beli</label>
                        <div class="input-group">
                            <input type="hidden" name="id_pembelian" id="id_pembelian"
                                value="{{ old('id_pembelian') }}">
                            <input type="text" class="form-control @error('nonota_beli') is-invalid @enderror"
                                placeholder="Nomor Nota Beli" id="nonota_beli" name="nonota_beli"
                                value="{{ old('nonota_beli') }}" aria-label="Nomor Nota Beli" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop1"></i>Cari Nomor Nota Beli</button>
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
                    <label for="exampleInputtgl_kadaluarsa">Tanggal kadaluarsa</label>
                        <input type="date" class="form-control @error('tgl_kadaluarsa') is-invalid @enderror" id="exampleInputtgl_kadaluarsa"
                    placeholder="tgl_kadaluarsa" name="tgl_kadaluarsa"
                    value="{{old('tgl_kadaluarsa')}}"> @error('tgl_kadaluarsa') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleInputjumlah_beli">Jumlah Beli</label>
                        <input type="number" class="form-control @error('jumlah_beli') is-invalid @enderror" id="exampleInputjumlah_beli" onkeyup="hitung()"
                    placeholder="Jumlah Beli" name="jumlah_beli"
                    value="{{old('jumlah_beli')}}"> @error('jumlah_beli') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    
                    <!-- <div class="form-group">
                    <label for="exampleInputsub_total_beli">Sub Total Beli</label>
                        <input type="number" class="form-control @error('sub_total_beli') is-invalid @enderror" id="exampleInputsub_total_beli"
                    placeholder="Sub Total Beli" name="sub_total_beli"
                    value="{{old('sub_total_beli')}}"> @error('sub_total_beli') <span class="text-danger">{{$message}}</span> @enderror
                    </div> -->
                    
                    <div class="form-group">
                    <label for="exampleInputharga_beli">Harga Beli</label>
                        <input type="number" class="form-control @error('harga_beli') is-invalid @enderror" id="exampleInputharga_beli"
                    placeholder="Harga Beli" name="harga_beli"
                    value="{{old('harga_beli')}}"> @error('harga_beli') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleInputpersen_margin_jual">Persen Margin Jual</label>
                        <input type="number" class="form-control @error('persen_margin_jual') is-invalid @enderror" id="exampleInputpersen_margin_jual"
                    placeholder="Persen Margin Jual" name="persen_margin_jual"
                    value="{{old('persen_margin_jual')}}"> @error('persen_margin_jual') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                
                    <div class="card-footer">
                     <button type="submit" class="btn btn-
primary">Simpan</button>
                    <a href="{{route('detail_pembelian.index')}}" class="btn 
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
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Tanggal Beli</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover table-bordered table-stripped" id="example1">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nomor Nota Beli</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pembelian as $key => $pembelian)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td id={{$key+1}}>{{ $pembelian->nonota_beli }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs"
                                                onclick="pilih1('{{ $pembelian->id }}', '{{ $pembelian->nonota_beli }}')"
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
                                        <th>Stok Obat</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($obat as $key => $obat)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $obat->nama_obat }}</td>
                                        <td>{{ $obat->stok}}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs"
                                                onclick="pilih2('{{ $obat->id }}', '{{$obat->nama_obat}}', '{{$obat->stok}}')"
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
                function hitung() {
                    // alert(document.getElementy)
                    let harga = document.getElementById("exampleInputharga_beli").value;
                    let jumlah = document.getElementById("exampleInputjumlah_beli").value;
                    // let total = (harga) * (jumlah)
                    let sub_total = document.getElementById("exampleInputsub_total_beli");
                    sub_total.value = harga * jumlah;
                }

                $('#example1').DataTable({
                    "responsive": true,
                });

                function pilih1(id, nonota_beli) {
                    document.getElementById('id_pembelian').value = id
                    document.getElementById('nonota_beli').value = nonota_beli
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

            <!-- <script>
                function jual() {
                    let harga = document.getElementById("harga_jual").value
                    let persen = document.getElementById("persen_margin_jual").value
                    let total = parseInt(harga) * parseInt(persen)
                    document.getElementById()
                } -->


            <script>
                
                </script>
            @endpush
