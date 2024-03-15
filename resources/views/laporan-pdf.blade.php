<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #e9e9e9;
    }

    tr:hover {
        background-color: #ddd;
    }
</style>
<table class="table table-hover table-bordered 
table-stripped" id="example2">
                    <h1> LAPORAN PEMBELIAN </h1>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No Nota Jual</th>
                            <th>Tanggal Jual</th>
                            <th>Total Jual</th>
                            <th>Id Users</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penjualan as $key => $penjualan)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td id={{$key+1}} >{{$penjualan->nonota_jual}}</td>
                            <td>{{$penjualan->tgl_jual}}</td>
                            <td>{{$penjualan->total_jual}}</td>
                            <td>{{$penjualan->fuser->name}}</td>
                {{ $penjualan->nonota_jual }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>