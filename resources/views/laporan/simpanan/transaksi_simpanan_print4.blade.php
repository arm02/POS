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

    <title>Transaksi-Simpanan</title>
</head>

<?php $profil = \App\Model\Pengaturan\Profil::findOrNew(1); $i = 1;?>
<body class="metro" onload="StartClock()" onunload="KillClock()">
<header>
    <img src="{{ public_path('foto/profil/'.$profil->foto) }}" alt="" width="10%" style="float: left">
    <p ><b>{!! $profil->nama_koperasi !!}</b> <br>{!! $profil->alamat_koperasi !!}
        <br> {!! $profil->telepon !!} / {!! $profil->kode_pos !!}
        <br> - <br>User : {!! \Illuminate\Support\Facades\Auth::user()->username !!}
    </p>
    <p style="margin-left: 50%"><b>LAPORAN TRANSAKSI SIMPANAN</b>
        <br>
    <table style="position:absolute;margin-left: 260%;margin-top: 2%;">
        <tr>
            <td width="50">No. Transkasi</td>
            <td width="1">:</td>
            <td width="100">{!! $trannya !!}</td>
        </tr>
        <tr style="font-size: 10pt">
            <td width="20">No. Simpanan</td>
            <td width="1">:</td>
            <td width="100">{!! $simpnya !!}</td>
        </tr>
        <tr style="font-size: 10pt">
            <td width="20">Tanggal</td>
            <td width="1">:</td>
            <td width="100">{!! $datenya !!}</td>
        </tr>
        <tr style="font-size: 10pt">
            <td width="20">Jns. Simpanan</td>
            <td width="1">:</td>
            <td width="100">{!! $js !!}</td>
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
        <th class="text-center">Jenis</th>
        <th align="right">Jumlah</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1; $s = 0;?>
        @foreach($aturan as $key => $item)
            @foreach($simpanan as $value)
                @if($value['idj'] == $item['idj'])
                    <?php $aturan[$key]['idp']+=$value['sld']; ?>
                    <?php $s+=$value['sld']; ?>
                @endif
            @endforeach
            <tr>
                <td align="center">{!! $i++ !!}</td>
                <td>{!! $item['jenis'] !!}</td>
                <td align="right">{!! number_format($aturan[$key]['idp'] - $item['idj'], 2, '.', ',') !!}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th align="right" colspan="3">{!! number_format($s, 2, '.', ',') !!}</th>
    </tr>
    </tfoot>
</table>
<br>
<div style="text-align: right">
    <?php date_default_timezone_set('Asia/Jakarta'); ?>     {{date('r')}}
</div>


</body>
</html>
