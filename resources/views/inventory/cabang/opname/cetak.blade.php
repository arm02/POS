<!DOCTYPE html>
<html>
<head>
    <script language="JavaScript">

        <!--
        // please keep these lines on when you copy the source
        // made by: Nicolas - http://www.javascript-page.com

        var clockID = 0;

        function StartClock() {
            clockID = setTimeout("KillClock()", 100);
        }

        function KillClock() {
            if(clockID) {
                clearTimeout(clockID);
                window.print();
                history.back(-1);
                clockID  = 0;
            }
        }
        $(document).ready(function() {
            UpdateClock();
            StartClock();
            KillClock();
        });

        //-->

    </script>

    <style type="text/css">
        table, td {
            border: 0px solid black;
            border-collapse: collapse;
            font-size:10pt;
        }
        th {
            background: #d8d8d8;
            border-top: 1px solid black;
            border-collapse: collapse;
            font-size:10pt;
        }
        th {
            border-bottom: 1px solid;
            vertical-align: middle;
        }
        p {
            margin-top: auto;
            margin-left: 3%;
            font-size:10pt;
            position: absolute;
        }
    </style>

    <title>Invoice</title>
</head>

<?php $profil = \App\Model\Pengaturan\Profil::findOrNew(1); $i = 1;?>
<body class="metro" onload="StartClock()" onunload="KillClock()">
<header>
    <img src="{{ public_path('foto/profil/'.$profil->foto) }}" alt="" width="10%" style="float: left">
    <p><center><b><label style="font-size: 20px">{{$profil->nama_koperasi}}</label></b>
        <br><label style="font-size: 10px">( {{$header->cabang->nama}} - {{$header->cabang->kode}} )</label>
        <br>{{$profil->alamat_koperasi}}
        <br> {{$profil->telepon}} - {{$profil->kode_pos}}
    </center></p>
</header>
<br><hr>
<header>
    <p style="margin-left: 60%;  position: absolute">
        <label style="font-size: 20px"><b>Stock Opname</b></label>
    </p>
    <table style="margin-left: 315%; margin-top: 5%; position: absolute;">
        <tr>
            <td width="50">No. Faktur</td>
            <td width="1">:</td>
            <td width="100">{{$header->nopembelian}}</td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td width="1">:</td>
            <td width="100">{{$header->tanggal}}</td>
        </tr>
    </table>
</header>
<br><br/><br>
<table width="100%" style="margin-top:6%;">
    <thead>
    <tr>
        <th class="text-center" width="10%">No</th>
        <th class="text-center" width="20%">Produk</th>
        <th class="text-center" width="20%">Barcode</th>
        <th class="text-center" width="25%">Stok Sistem</th>
        <th class="text-center" width="25%">Stok Fisik</th>
        <th class="text-center" width="25%">Selisih</th>
    </tr>
    </thead>
    <tbody>
    @foreach($detail as $details)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$details->barang->nama}}</td>
            <td align="center">{{$details->barang->barcode}}</td>
            <td align="center">{{$details->stok_sistem}}</td>
            <td align="right">{{$details->stok_fisik}}</td>
            <td align="right">{{$details->stok_fisik - $details->stok_sistem}}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th colspan="11" align="right"></th>
    </tr>
    </tfoot>
</table>
<br>

</body>
</html>
