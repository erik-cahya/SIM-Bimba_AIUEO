<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Resume</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> --}}
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            text-indent: 0;
            color: black;
            font-family: Arial, sans-serif;
        }

        /* p {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 10.5pt;
            margin: 0pt;
        }

        h2 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 12pt;
        }

        h1 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: underline;
            font-size: 16pt;
        }

        h3 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 9.5pt;
        } */


        /* table,
        tbody {
            vertical-align: top;
            overflow: visible;
        } */

        h1 {
            font-size: 15pt;
        }

        h2 {
            font-size: 12pt;
        }

        h3 {
            font-size: 9.5pt;
        }

        .container {
            display: flex;

            text-align: center;
        }

        hr {
            width: 80%;
            margin: auto;
        }

        .table {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 11px;
            width: 650px;
        }

        .headingPdf {
            margin-top: 20px;
            text-decoration: underline;

        }

        .header-table {
            text-align: center;
            text-transform: uppercase;
        }

        h3 {
            text-transform: uppercase;
        }
    </style>
</head>

<body>

    <div class="container">
        <img src="{{ public_path('images\kopSurat.jpg') }}" alt="inigambar" width="550px">
        <hr>
        <h1 class="headingPdf">Laporan Perkembangan Murid</h1>
    </div>

    <div style="margin: 0 auto;display: block; width: 650px; margin-top: 10px">

        <table border="0">
            <tr>
                <td width="120px">
                    <h3>PERIODE</h3>
                </td>
                <td>
                    <h3>:</h3>
                </td>
                <td>
                    <h3>{{ $periode }}</h3>
                </td>

            </tr>
            <tr>
                <td>
                    <h3>JUMLAH MURID</h3>
                </td>
                <td>
                    <h3>:</h3>
                </td>
                <td>
                    <h3>{{ $get_data_perkembangan->count() }} Orang</h3>
                </td>
            </tr>
        </table>
    </div>


    <div style="margin: 0 auto;display: block;width: 650px; margin-top: 15px">
        <table class="table" border="1">
            <tr class="header-table">
                <td><strong>NO</strong></td>
                <td><strong>NAMA MURID</strong></td>
                <td><strong>Nama Guru</strong></td>
                <td><strong>Tanggal</strong></td>
                <td><strong>Deskripsi</strong></td>
            </tr>
            @php
                $number = 1;
            @endphp
            @foreach ($get_data_perkembangan as $perkembangan)
                <tr style="text-align: center;">
                    <td>{{ $number }}</td>
                    <td>{{ $perkembangan->nama_murid }}</td>
                    <td>{{ $perkembangan->nama_user }}</td>
                    <td>{{ date('d-m-Y', strtotime($perkembangan->tgl_perkembangan)) }}</td>
                    <td width="300px">{{ $perkembangan->deskripsi }} </td>
                </tr>
                @php
                    $number++;
                @endphp
            @endforeach

        </table>
    </div>

</body>

</html>
