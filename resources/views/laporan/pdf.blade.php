<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Keuangan</title>

    <style>
        .text-center {
          text-align: center;
        }
        
        table {
          width: 100%;
          border-collapse: collapse;
        }

        th {
          background-color: #f5f5f5;
          border: 1px solid #ddd;
          text-align: center;
          padding: 8px;
        }

        td {
          border: 1px solid #ddd;
          text-align: center;
          padding: 8px;
        }

        .table-striped tbody tr:nth-of-type(odd) {
          background-color: #f9f9f9;
        }
        </style>
</head>
<body>
    <h3 class="text-center">Laporan Keuangan</h3>
    <h4 class="text-center">
        Periode
        Tanggal {{ tanggal_indonesia($awal, false) }}
        s/d
        Tanggal {{ tanggal_indonesia($akhir, false) }}
    </h4>

    <table class="table table-striped">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Tanggal</th>
                <th>Penjualan Menu</th>
                <th>Pembelian Bahan</th>
                <th>Gaji Karyawan</th>
                <th>Pemasukan</th>
                <th>Pengeluaran</th>
                <th>Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    @foreach ($row as $col)
                        <td>{{ $col }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>