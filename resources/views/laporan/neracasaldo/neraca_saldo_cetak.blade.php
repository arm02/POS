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

    <title>Laporan-Neraca-Saldo</title>
</head>

<body class="metro" onload="StartClock()" onunload="KillClock()">
<header>
    <img src="{{ public_path('foto/profil/'.$profil->foto) }}" alt="" width="10%" style="float: left">
    <p ><b>{!! $profil->nama_koperasi !!}</b> <br>{!! $profil->alamat_koperasi !!}
        <br> {!! $profil->telepon !!} / {!! $profil->kode_pos !!}
        <br> - <br>User : {!! \Illuminate\Support\Facades\Auth::user()->username !!}
    </p>
    <p style="margin-left: 50%"><b>LAPORAN NERACA SALDO</b>
        <br>
        <table style="position:absolute;margin-left: 315%;margin-top: 2%;">
            <tr>
                <td width="50">Tanggal</td>
                <td width="1">:</td>
                <td width="100">{!! $tanggal !!}</td>
            </tr>
        </table>
    </p>
</header>
<br><br><br><br><br><br>
<table width="100%">
    <thead>
    <tr>
        <th class="text-center" width="5%">No</th>
        <th class="text-center" width="15%">Kode Akun</th>
        <th class="text-center" width="50%">Nama Akun Perkiraan</th>
        <th class="text-center" width="15%">Debet</th>
        <th class="text-center" width="15%">Kredit</th>
    </tr>
    </thead>
    <tbody>
        @foreach($jurnal as $header)
            <?php $detail = App\Model\Akuntansi\JurnalDetail::where('id_header', $header->id)->groupBy('id_akun')->get();?>
            @foreach($detail as $row)
            <tr>
                <td><center>{{$i++}}.</center></td>
                <td style="padding-left:15%;">{{$row->perkiraan->kode_akun}}</td>
                <td style="padding-left:15%;">{{$row->perkiraan->nama_akun}}</td>
                <td style="padding-left:15%;text-align:right;">Rp. {{substr($row->debet, 0,10)}}</td>
                <td style="padding-left:15%;text-align:right;">Rp. {{substr($row->kredit, 0,10)}}</td>
            </tr>
            @endforeach
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
