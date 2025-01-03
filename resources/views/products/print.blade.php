<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Pesanan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Data Pesanan</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal Pemesanan</th>
                <th>Pilihan</th>
                <th>Gedung Asrama</th>
                <th>Jumlah (kg)</th>
                <th>No Kamar</th>
                <th>Total Harga</th>
                <th>Catatan</th>
                <th>Status Pembayaran</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->nama }}</td>
                    <td>{{ $product->tanggal_pemesanan }}</td>
                    <td>{{ $product->pilihan_kategori }}</td>
                    <td>{{ $product->gedung_asrama }}</td>
                    <td>{{ $product->jumlah_kg }}</td>
                    <td>{{ $product->no_kamar }}</td>
                    <td>{{ $product->total_harga }}</td>
                    <td>{{ $product->catatan }}</td>
                    <td>{{ $product->status_pembayaran }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
