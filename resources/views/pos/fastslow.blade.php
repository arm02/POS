<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    @include('templates.headerpos')


</head>

<body>
<style>

    body{
        margin:0;
        background-color:#FFF;
    }

</style>
</body>
<body id="">


<a onclick="FunctionLoading()" href="{!!url('/pos/laporan/transaksi')!!}">
    <img src="{{ url('assets/poscss/imgs/back.png') }}" style="margin-left:40px;width:40px;height:40px;margin-top:68px;position:absolute" alt=""></a>
<div style="height:80px; margin-top:50px;float:left; margin-left:90px; position:absolute;color:#3498db;font-size:50px">&nbsp;<b>Produk Slow&Fast Moving</b></div>


<div style="width:100%; height:100%; margin: 0 auto; background-color:#FFF">
    <div id="hide1" style="display:none;color:black;font-size:15px;position:absolute;margin-left:64.7%;margin-top:19.2%">TO</div>
    <div id="hide2" style="display:none;color:black;font-size:15px;position:absolute;margin-left:64.7%;margin-top:19.2%">TO</div>
    <div id="hide3" style="display:none;color:black;font-size:15px;position:absolute;margin-left:64.7%;margin-top:19.2%">TO</div>

    <button id="btnok1" style="display:none;position:absolute;margin-top:19%;margin-left:80%;color:#FFF;border:none;background:#3498db;width:4%;height:25px;font-size:10px;cursor:pointer">OK</button>
    <button id="btnok2" style="display:none;position:absolute;margin-top:19%;margin-left:80%;color:#FFF;border:none;background:#3498db;width:4%;height:25px;font-size:10px;cursor:pointer">OK</button>
    <button id="btnok3" style="display:none;position:absolute;margin-top:19%;margin-left:80%;color:#FFF;border:none;background:#3498db;width:4%;height:25px;font-size:10px;cursor:pointer">OK</button>

    <input id="datepicker1" type="text" style="display:none;position:absolute;width:11%;font-size:12px;color:#000;text-align:center;margin-left:53%;margin-top:19.2%"/>
    <input id="datepicker2" type="text" style="display:none;position:absolute;width:11%;font-size:12px;color:#000;text-align:center;margin-left:67%;margin-top:19.2%"/>

    <input id="datepickerr1" type="text" style="display:none;position:absolute;width:11%;font-size:12px;color:#000;text-align:center;margin-left:53%;margin-top:19.2%"/>
    <input id="datepickerr2" type="text" style="display:none;position:absolute;width:11%;font-size:12px;color:#000;margin-left:67%;text-align:center;margin-top:19.2%"/>

    <input id="datepickerrr1" type="text" style="display:none;position:absolute;width:11%;font-size:12px;color:#000;margin-left:53%;text-align:center;margin-top:19.2%"/>
    <input id="datepickerrr2" type="text" style="display:none;position:absolute;width:11%;font-size:12px;color:#000;margin-left:67%;text-align:center;margin-top:19.2%"/>


    <div id="show" style="color:black;font-size:16px;position:absolute;margin-left:4%;margin-top:12%">Jenis Produk</div>
    <div id="show" style="color:black;font-size:16px;position:absolute;margin-left:29%;margin-top:12%">Cabang</div>
    <div id="show" style="color:black;font-size:16px;position:absolute;margin-left:4%;margin-top:17%">Jenis Transaksi</div>
    <input id="tanggalnya" type="hidden" value="{{ $tanggalnya  }}">
    <input id="tanggalnya2" type="hidden" value="{{ $tanggalnya2  }}">
    <input id="kasirnya" type="hidden" value="{{ $kasirnya }}">
    <input id="cabangnya" type="hidden" value="{{ $cb  }}">
    <input id="jenisnya" type="hidden" value="{{ $jt  }}">
    <input id="bzz" type="hidden" value="{{ $bzz  }}">
    <div id="hide" style="color:black;font-size:16px;position:absolute;margin-left:29%;margin-top:17%">Range Hari/Bulan/Tahun</div>
    {{--<button id="btnok" style="position:absolute;margin-top:19%;margin-left:44%;color:#FFF;border:none;background:#3498db;width:5%;height:33px;font-size:15px;cursor:pointer">OK</button>--}}
    <div style="font-size:16px;position:absolute;margin-left:4%;width:90%;margin-top:14%">
        <select style="font-size:14px;width:25%;font-size:16px;margin-left:28%;position:absolute;color:black;margin-top:7%" id="idkasir">
            <option placeholder="pilih nama kasir"></option>
            <option value="allkasir">Semua Jenis Produk</option>
                <option value="1">Fast Moving</option>
            <option value="2">Slow Moving</option>
        </select>
    </div>

    <div style="font-size:16px;position:absolute;margin-left:29%;width:90%;margin-top:14%">
        <select style="font-size:14px;width:25%;font-size:16px;margin-left:28%;position:absolute;color:black;margin-top:3%" id="idkasi">
            <option placeholder="pilih nama kasir"></option>
            <option value="0">Semua Cabang</option>
            @foreach($cabang as $values)
                <option value="{!! $values->id !!}">{!! $values->kode !!} - {!! $values->nama !!}</option>
            @endforeach
        </select>
    </div>

    <div style="font-size:16px;position:absolute;margin-left:4%;width:22.5%;margin-top:19%">
        <select style="font-size:14px;width:100%;font-size:16px;margin-left:28%;position:absolute;color:black;margin-top:3%" id="idkasirr">
            <option placeholder="pilih nama kasir"></option>
            <option value="test">Semua Jenis</option>
            <option value="cash">Tunai</option>
            <option value="tunda">Tunda</option>
        </select>
    </div>


    <div style="font-size:16px;position:absolute;margin-left:29%;width:22.5%;margin-top:19%">
        <select style="font-size:14px;width:100%;font-size:16px;margin-left:28%;position:absolute;color:black;margin-top:3%" id="idksr">
            <option placeholder="pilih nama kasir"></option>
            <option value="day">Hari</option>
            <option value="month">Bulan</option>
            <option value="year">Tahun</option>
        </select>
    </div>
    <input value="{{ $isinya  }}" id="isinya" type="hidden">

    <button id="pdf" class="mif-file-powerpoint" style="display:block;background:#EF4836;width:10%;color:#fff;font-size:14px;border:none;height:40px;margin-left:86.2%;margin-top:18.3%;position:absolute">&nbsp;PDF</button>
    <button id="pdf1" class="mif-file-powerpoint" style="display:none;background:#EF4836;width:10%;color:#fff;font-size:14px;border:none;height:40px;margin-left:86.2%;margin-top:18.3%;position:absolute">&nbsp;PDF</button>
    <button id="pdf2" class="mif-file-powerpoint" style="display:none;background:#EF4836;width:10%;color:#fff;font-size:14px;border:none;height:40px;margin-left:86.2%;margin-top:18.3%;position:absolute">&nbsp;PDF</button>


    <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:22%; margin-left:3%; width:94%;height:250px">


        <div class="x_panel" style="background:#3498db;margin-top:0px;">

            <div id="table-scroll6" style="width:100%;margin-left:-0.1%">

                <table id="table" class="display dataTable table table-hover" cellspacing="0" style="margin-top:0px; margin-left:0px;width:100%;position:relative;background:white;">
                    <thead>
                    <tr style="background:#3498db; color: white; font-size:20px;">
                        <td align="center"><b>Produk</b></td>
                        <td align="center"><b>Barcode</b></td>
                        <td align="center"><b>Expired</b></td>
                        <td align="center"><b>Stok Out</b></td>
                    </tr>
                    </thead>

                    <tbody style="overflow:auto; height: 50px;">
                    @foreach($detail as $value)
                        <?php
                        {


                        }
                        ?>
                        <tr style="background-color: white; font-size:17px; color:black;">
                            <td align="center">{!! $value->nama !!}</td>
                            <td align="center">{{ $value->barcode  }}</td>
                            <td align="center">{{ $value->expired }}</td>
                            <td align="center">{{ $value->jumlah_qty  }}</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div id="paginationharian" style="margin-left:4%;margin-top:44%;position:absolute">{{ $detail->links()  }}</div>
</div>



<!--header-->


<script>
    var kasir = $('#kasirnya').val();

    $("#idkasir").select2({
        placeholder: "Pilih Jenis",
        allowClear: true
    });

    $("#idksr").select2({
        placeholder: "Pilih Hari/Bulan/Tahun",
        allowClear: true
    });

    $("#idkasi").select2({
        placeholder: "Pilih Cabang",
        allowClear: true
    });

    $("#idkasirr").select2({
        placeholder: "Jenis Transaksi",
        allowClear: true
    });

    $("#tanggalnya").datepicker({
        dateFormat: "yyyy-MM-dd",
        autoclose :true
    });

    $("#datepicker1").datepicker({
        dateFormat: "yyyy-MM-dd",
        autoclose: true
    });

    $("#datepicker2").datepicker({
        dateFormat: "yyyy-MM-dd",
        autoclose: true
    });


    $('#datepickerr1').datepicker({
        format: "mm",
        viewMode: "months",
        minViewMode: "months",
        autoclose: true
    });
    $('#datepickerr2').datepicker({
        format: "mm",
        viewMode: "months",
        minViewMode: "months",
        autoclose: true
    });

    $('#datepickerrr1').datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
        autoclose: true
    });

    $('#datepickerrr2').datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
        autoclose: true
    });
    var bzz = $('#bzz').val();

    if(bzz=="Hari")
    {
        $('#pdf').css('display','block');
        $('#pdf1').css('display','none');
        $('#pdf2').css('display','none');
    }
    else if(bzz=="Bulan")
    {
        $('#pdf').css('display','none');
        $('#pdf1').css('display','block');
        $('#pdf2').css('display','none');
    }
    else if(bzz=="Tahun")
    {
        $('#pdf').css('display','none');
        $('#pdf1').css('display','none');
        $('#pdf2').css('display','block');
    }


    $('#idksr').on('change', function() {

        if ($('#idksr').val() == "day") {

            $('#btnok1').css('display','block');
            $('#hide1').css('display','block');
            $('#datepicker1').css('display','block');
            $('#datepicker2').css('display','block');

            $('#pdf').css('display','block');
            $('#pdf1').css('display','none');
            $('#pdf2').css('display','none');

            $('#btnok2').css('display','none');
            $('#hide2').css('display','none');
            $('#datepickerr1').css('display','none');
            $('#datepickerr2').css('display','none');

            $('#btnok3').css('display','none');
            $('#hide3').css('display','none');
            $('#datepickerrr1').css('display','none');
            $('#datepickerrr2').css('display','none');


        }
        else if ($('#idksr').val() == "month") {

            $('#pdf').css('display','none');
            $('#pdf1').css('display','block');
            $('#pdf2').css('display','none');

            $('#btnok2').css('display','block');
            $('#hide2').css('display','block');
            $('#datepickerr1').css('display','block');
            $('#datepickerr2').css('display','block');

            $('#btnok3').css('display','none');
            $('#hide3').css('display','none');
            $('#datepickerrr1').css('display','none');
            $('#datepickerrr2').css('display','none');

            $('#btnok1').css('display','none');
            $('#hide1').css('display','none');
            $('#datepicker1').css('display','none');
            $('#datepicker2').css('display','none');


        }
        else if ($('#idksr').val() == "year") {


            $('#btnok3').css('display','block');
            $('#hide3').css('display','block');
            $('#datepickerrr1').css('display','block');
            $('#datepickerrr2').css('display','block');

            $('#btnok1').css('display','none');
            $('#hide1').css('display','none');
            $('#datepicker1').css('display','none');
            $('#datepicker2').css('display','none');

            $('#btnok2').css('display','none');
            $('#hide2').css('display','none');
            $('#datepickerr1').css('display','none');
            $('#datepickerr2').css('display','none');

            $('#pdf').css('display','none');
            $('#pdf1').css('display','none');
            $('#pdf2').css('display','block');


        }
    });


        $('#pdf').on('click', function () {

            var df = $('#tanggalnya').val();
            var dt = $('#tanggalnya2').val();

            if($('#isinya').val()=="")
            {
                window.open("{!! url('pos/laporan/stok/produk/fastslowall/hari/pdf') !!}/"+ df + "/" + dt + "/" + $('#cabangnya').val() + "/" + $('#jenisnya').val());
                location.href="{{ url('pos/laporan/stok/produk')  }}";

            }
            else
            {
                window.open("{!! url('pos/laporan/stok/produk/fastslow/hari/pdf') !!}/" + $('#kasirnya').val() + "/" + df + "/" + dt + "/" + $('#cabangnya').val() + "/" + $('#jenisnya').val());
                location.href="{{ url('pos/laporan/stok/produk')  }}";

            }

        });


        $('#pdf1').on('click', function () {

            var df = $('#tanggalnya').val();
            var dt = $('#tanggalnya2').val();

            if($('#isinya').val()=="")
            {
                window.open("{!! url('pos/laporan/stok/produk/fastslowall/bulan/pdf') !!}/" + df + "/" + dt + "/" + $('#cabangnya').val() + "/" + $('#jenisnya').val());
                location.href="{{ url('pos/laporan/stok/produk')  }}";

            }
            else
            {
                window.open("{!! url('pos/laporan/stok/produk/fastslow/bulan/pdf') !!}/" + $('#kasirnya').val() + "/" + df + "/" + dt + "/" + $('#cabangnya').val() + "/" + $('#jenisnya').val());
                location.href="{{ url('pos/laporan/stok/produk')  }}";

            }


        });


        $('#pdf2').on('click', function () {

            var df = $('#tanggalnya').val();
            var dt = $('#tanggalnya2').val();
            if($('#isinya').val()=="") {


            window.open("{!! url('pos/laporan/stok/produk/fastslowall/tahun/pdf') !!}/" + df + "/" + dt + "/" + $('#cabangnya').val() + "/" + $('#jenisnya').val());
            location.href = "{{ url('pos/laporan/stok/produk')  }}";
            }
            else
            {
            window.open("{!! url('pos/laporan/stok/produk/fastslow/tahun/pdf') !!}/" + $('#kasirnya').val() + "/" + df + "/" + dt + "/" + $('#cabangnya').val() + "/" + $('#jenisnya').val());
            location.href="{{ url('pos/laporan/stok/produk')  }}";

            }
        });



        $('#pdf').on('click', function () {
            var df = $('#tanggalnya').val();
            var dt = $('#tanggalnya2').val();

            // df = df.split('/');
            // var dfrom = df[2] + "-" + df[0] + "-" + df[1];
            // alert(dfrom);

        });



        $('#pdf1').on('click', function () {
            var df = $('#tanggalnya').val();
            var dt = $('#tanggalnya2').val();
            // df = df.split('/');
            // var dfrom = df[2] + "-" + df[0] + "-" + df[1];
            // alert(dfrom);

        });



        $('#pdf2').on('click', function () {
            var df = $('#tanggalnya').val();
            var dt = $('#tanggalnya2').val();
            // df = df.split('/');
            // var dfrom = df[2] + "-" + df[0] + "-" + df[1];
            // alert(dfrom);

        });


    $('#idkasir').on('change', function()
    {

        if ($('#idkasir').val()=="allkasir") {



            $('#btnok1').on('click', function () {

                var df = $('#datepicker1').val();
                var dt = $('#datepicker2').val();
                df = df.split('/');
                dt = dt.split('/');
                var dfrom = df[2] + "-" + df[0] + "-" + df[1];
                var dto = dt[2] + "-" + dt[0] + "-" + dt[1];

                location.href = "{!! url('pos/laporan/stok/all/search/day') !!}/" + dfrom + "/" + dto + "/" + $('#idkasi').val() + "/" + $('#idkasirr').val();
            });




            $('#btnok2').on('click', function () {

                var df = $('#datepickerr1').val();
                var dt = $('#datepickerr2').val();
                location.href = "{!! url('pos/laporan/stok/all/search/month') !!}/" + df + "/" + dt + "/" + $('#idkasi').val() + "/" + $('#idkasirr').val();
            });




            $('#btnok3').on('click', function () {

                var df = $('#datepickerrr1').val();
                var dt = $('#datepickerrr2').val();
                location.href = "{!! url('pos/laporan/stok/all/search/year') !!}/"  + df + "/" + dt + "/" + $('#idkasi').val() + "/" + $('#idkasirr').val();
            });




        }



        else
        {



            $('#btnok1').on('click', function () {


                var df = $('#datepicker1').val();
                var dt = $('#datepicker2').val();
                df = df.split('/');
                dt = dt.split('/');
                var dfrom = df[2] + "-" + df[0] + "-" + df[1];
                var dto = dt[2] + "-" + dt[0] + "-" + dt[1];

                location.href = "{!! url('pos/laporan/stok/fastslow/search/day') !!}/" + $('#idkasir').val() + "/" + dfrom + "/" + dto + "/" + $('#idkasi').val() + "/" + $('#idkasirr').val();
            });




            $('#btnok2').on('click', function () {

                var df = $('#datepickerr1').val();
                var dt = $('#datepickerr2').val();
                location.href = "{!! url('pos/laporan/stok/fastslow/search/month') !!}/" + $('#idkasir').val() + "/" + df + "/" + dt +  "/" + $('#idkasi').val() + "/" + $('#idkasirr').val();
            });




            $('#btnok3').on('click', function () {

                var df = $('#datepickerrr1').val();
                var dt = $('#datepickerrr2').val();
                location.href = "{!! url('pos/laporan/stok/fastslow/search/year') !!}/" + $('#idkasir').val() + "/" + df + "/" + dt + "/" + $('#idkasi').val() + "/" + $('#idkasirr').val();
            });






        }


    });


</script>
</body>
</html>
