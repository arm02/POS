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

    <title>Mutasi-Pinjaman</title>
</head>

<?php $profil = \App\Model\Pengaturan\Profil::findOrNew(1); $i = 1;?>
<body class="metro" onload="StartClock()" onunload="KillClock()">
<header>
    <img src="{{ public_path('foto/profil/'.$profil->foto) }}" alt="" width="10%" style="float: left">
    <p ><b>{!! $profil->nama_koperasi !!}</b> <br>{!! $profil->alamat_koperasi !!}
        <br> {!! $profil->telepon !!} / {!! $profil->kode_pos !!}
        <br> - <br>User : {!! \Illuminate\Support\Facades\Auth::user()->username !!}
    </p>
    <p style="margin-left: 50%"><b>LAPORAN MUTASI SIMPANAN</b>
        <br>
    <table style="position:absolute;margin-left: 260%;margin-top: 2%;">
        <tr>
            <td width="50">No. Pinjaman</td>
            <td width="1">:</td>
            <td>{!! $pinjaman->nomor_pinjaman !!}</td>
        </tr>
        <tr style="font-size: 10pt">
            <td width="20">Nama</td>
            <td width="1">:</td>
            <td>{!! $pinjaman->anggotaid->nama !!}</td>
        </tr>
        <tr style="font-size: 10pt">
            <td width="20">Tgl. Realisasi</td>
            <td width="1">:</td>
            <td width="100">{!! $pinjaman->realisasiid->tanggal_realisasi !!}</td>
        </tr>
        <tr style="font-size: 10pt">
            <td width="20">Jml. Realisasi</td>
            <td width="1">:</td>
            <td width="100">{!! number_format($pinjaman->realisasiid->realisasi, 2, '.', ',') !!}</td>
        </tr>
    </table>
    </p>
</header>
<br><br/><br><br/><br><br/><br>
<table width="100%">
    <thead>
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">No.Transaksi</th>
        <th class="text-center">Tanggal</th>
        <th class="text-center">NPK</th>
        <th class="text-center">Nama Anggota</th>
        {{--<th class="text-center">Tipe</th>--}}
        <th class="text-center">Keterangan</th>
        <th align="right">Pokok</th>
        <th align="right">Bunga</th>
        <th align="right">Denda</th>
        <th align="right">Saldo</th>
    </tr>
    </thead>
    <tbody>
    @foreach($mutasi as $value)
        <tr>
            <td align="center">{!! $i++ !!}</td>
            <td>{!! $value->nomor_transaksi !!}</td>
            <td align="center">{!! $value->tanggal !!}</td>
            <td>{!! $value->pinjamanid->anggotaid->npk !!}</td>
            <td>{!! $value->pinjamanid->anggotaid->nama !!}</td>
            {{--<td>{!! $value->tipe !!}</td>--}}
            <td>{!! $value->keterangan !!}</td>
            <td align="right">{!! number_format($value->pokok, 2, '.', ',') !!}</td>
            <td align="right">{!! number_format($value->bunga, 2, '.', ',') !!}</td>
            <td align="right">{!! number_format($value->denda, 2, '.', ',') !!}</td>
            <td align="right">{!! number_format($value->saldo, 2, '.', ',') !!}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th colspan="6" align="right">TOTAL : </th>
        <th align="right">{!! number_format($tpokok, 2, '.', ',') !!}</th>
        <th align="right">{!! number_format($tbunga, 2, '.', ',') !!}</th>
        <th align="right">{!! number_format($tdenda, 2, '.', ',') !!}</th>
        <th align="right">{!! number_format($tsaldo, 2, '.', ',') !!}</th>
    </tr>
    </tfoot>
</table>
<br>
<div style="text-align: right">
    <?php date_default_timezone_set('Asia/Jakarta'); ?>     {{date('r')}}
</div>


</body>
</html>
