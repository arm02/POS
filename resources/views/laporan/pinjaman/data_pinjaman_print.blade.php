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
            font-size:8pt;
        }
        th {
            background: #d8d8d8;
            border-top: 1px solid black;
            border-collapse: collapse;
            font-size:10pt;
        }
        th, td {
            padding: 5px;
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

    <title>Data-Pinjaman</title>
</head>

<?php $profil = \App\Model\Pengaturan\Profil::findOrNew(1); $i = 1;?>
<body class="metro" onload="StartClock()" onunload="KillClock()">
<header>
    <img src="{{ public_path('foto/profil/'.$profil->foto) }}" alt="" width="7%" style="float: left">
    <p ><b>{!! $profil->nama_koperasi !!}</b> <br>{!! $profil->alamat_koperasi !!}
        <br> {!! $profil->telepon !!} / {!! $profil->kode_pos !!}
        <br> - <br>User : {!! \Illuminate\Support\Facades\Auth::user()->username !!}
    </p>
    <p style="margin-left: 70%"><b>LAPORAN DATA PINJAMAN</b>
        <br>
    <table style="position:absolute;margin-left: 538%;margin-top: 2%;">
        <tr>
            <td width="50">No. Pinjaman</td>
            <td width="1">:</td>
            <td width="100">{!! $pinjnya !!}</td>
        </tr>
        <tr style="font-size: 10pt">
            <td width="20">No. Customer</td>
            <td width="1">:</td><td width="100">{!! $csnya !!}</td>
        </tr>
        <tr style="font-size: 10pt">
            <td width="20">Tgl. Pengajuan</td>
            <td width="1">:</td>
            <td width="100">{!! $datenya !!}</td>
        </tr>
        <tr style="font-size: 10pt">
            <td width="20">Jns. Pinjaman</td>
            <td width="1">:</td>
            <td width="100">{!! $jpnya !!}</td>
        </tr>
        <tr style="font-size: 10pt">
            <td width="20">Jns. Customer</td>
            <td width="1">:</td>
            @if($jc != "")
                <td width="100">{!! $jc !!}</td>
            @endif
        </tr>
    </table>
    </p>
</header>
<br><br><br><br><br/><br><br/><br>
<table width="100%">
    <thead>
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">No. Pinjaman</th>
        <th class="text-center">Nama</th>
        <th class="text-center">Alamat</th>
        <th class="text-center">Telepon</th>
        <th class="text-center">Waktu</th>
        <th class="text-center">Bunga</th>
        <th class="text-center">Tgl. Pengajuan</th>
        <th class="text-center">Jml. Pengajuan</th>
        <th class="text-center">jns. Pinjaman</th>
        <th class="text-center">Kolektibilitas</th>
    </tr>
    </thead>
    <tbody>
    @foreach($pinjaman as $value)
        @if($value['nopinj'] != "")
        <tr>
            <td align="center">{!! $i++ !!}</td>
            <td>{!! $value['nopinj'] !!}</td>
            <td>{!! $value['nama'] !!}</td>
            <td>{!! $value['alamat'] !!}</td>
            <td>{!! $value['telp'] !!}</td>
            <td align="right">{!! $value['waktu'] !!}</td>
            <td align="right">{!! $value['bunga'] !!}</td>
            <td align="center">{!! $value['tgl'] !!}</td>
            <td align="right">{!! $value['jml'] !!}</td>
            <td>{!! $value['jenis'] !!}</td>
            <td align="center">{!! $value['kolek'] !!}</td>
        </tr>
        @endif
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th colspan="11" align="right"> </th>
    </tr>
    </tfoot>
</table>
<br>
<div style="text-align: right">
    <?php date_default_timezone_set('Asia/Jakarta'); ?>     {{date('r')}}
</div>


</body>
</html>
