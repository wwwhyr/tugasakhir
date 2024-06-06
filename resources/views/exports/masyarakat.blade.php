<!DOCTYPE html>
<html>
<head>
    <title>Data Masyarakat</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Data Masyarakat</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Kecamatan</th>
                <th>Desa</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Tanggal Lahir</th>
                <th>Gizi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($masyarakats as $masyarakat)
                <tr>
                    <td>{{ $masyarakat->id }}</td>
                    <td>{{ $masyarakat->kecamatan }}</td>
                    <td>{{ $masyarakat->desa }}</td>
                    <td>{{ $masyarakat->nama }}</td>
                    <td>{{ $masyarakat->nik }}</td>
                    <td>{{ $masyarakat->tgllahir }}</td>
                    <td>{{ $masyarakat->gizi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
