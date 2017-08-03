<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset('assets/poscss/css/bootstrap.min.css')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/templateinventory/inventory.ico') }}">
    <link href="{{ asset('assets/templateinventory/css/metro-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/templateinventory/css/metro-schemes.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/templateinventory/css/metro.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/templateinventory/css/docs.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/templateinventory/js/jquery-2.1.3.min.js') }}"></script>
    <script src="{{ asset('assets/templateinventory/js/metro.js') }}"></script>
    <script src="{{ asset('assets/templateinventory/js/docs.js') }}"></script>
    <script src="{{ asset('assets/templateinventory/js/jquery.dataTables.min.js') }}"></script>
    <style>
        body{
            margin:0;
            background-color:#fff;
            overflow:auto;
        }
    </style>
    <title>Inventory</title>
</head>

<body id="">
<div class="app-bar navy" data-role="appbar">
    <a class="app-bar-element" href="{!! url('/inventory') !!}"> <img style="height: 28px; display: inline-block; margin-right: 10px;" src="{{asset('assets/templateinventory/images/inventory.png') }}"> Menu Utama</a>
    <a href="{!! url('/login') !!}" class="app-bar-element place-right"> <span class="mif-switch"></span> Log Out</a>
    <span class="app-bar-divider"></span>
    <ul class="app-bar-menu">
    </ul>
</div>

<h1 style="margin-left:4%; margin-top:3%;"><a href="{!! url('/inventory') !!}" class="nav-button transform"><span></span></a>&nbsp;Stock Opname</h1>
<hr style="width:95%;"><br>
<div class="grid">
    <div class="row cells12">
        <div class="cell"></div>
        <div class="cell colspan10">
            <form action="{{url('inventory/cabang/opname/search')}}" method="get">
                <div class="row cells12">
                    <div class="cell colspan4">
                        <div class="input-control text" data-role="input" style="width:100%;">
                            <input type="text" name="keyword">
                        </div>
                    </div>
                    <div class="cell colspan4">
                        <button type="submit" class="button info" id="test"><span class="mif-search"></span></button>
                        {{csrf_field()}}
                    </div>
                    <div class="cell colspan4">
                        <a class="place-right" onclick="ceknomor('#dialog')" ><button type="button" class="button success"><span class="mif-paper-plane mif-ani-float"></span>Tambah Data Opname</button></a>
                    </div>
                </div>
            </form>

            <table class="dataTable striped hovered cell-hovered border bordered " data-searching="true" style="overflow:auto; width:100%; background-color:#fff; width:100%;">
                <thead>
                <tr>
                    <th class="text-center ribbed-cyan fg-white padding10 text-shadow">No</th>
                    <th class="text-center ribbed-cyan fg-white padding10 text-shadow">No. Opname</th>
                    <th class="text-center ribbed-cyan fg-white padding10 text-shadow">Tanggal</th>
                    <th class="text-center ribbed-cyan fg-white padding10 text-shadow">Cabang</th>
                    {{--<th class="text-center ribbed-cyan fg-white padding10 text-shadow">Status</th>--}}
                    {{--<th class="text-center ribbed-cyan fg-white padding10 text-shadow">Total Harga</th>--}}
                    <th class="text-center ribbed-cyan fg-white padding10 text-shadow" colspan="3"><center>Opsi</center></th>
                </tr>
                </thead>
                <tbody>
                <?php $i = ($header->currentPage() - 1) * $header->perPage() + 1; ?>
                @foreach($header as $headers)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$headers->nopembelian}}</td>
                        <td>{{$headers->tanggal}}</td>
                        <td>{{$headers->cabang->nama}}</td>
                        {{--<td>{{$headers->status}}</td>--}}
                        {{--<td>Rp. {{number_format($headers->detail->SUM('sub_total'), '2')}}</td>--}}
                        <td colspan="3"><center>
                                <a href="{{url('inventory/cabang/opname/editheader/'.$headers->id)}}"><button type="button" class="button {{$headers->start == 1 ? 'bg-grayLight fg-white' : 'warning'}}" align="center" {{$headers->start == 1 ? 'disabled' : ''}}>Edit</button></a>
                                <a href="{{url('inventory/cabang/opname/hapusheader/'.$headers->id)}}" class="button danger" align="center">Hapus</a>
                                <a href="{{url('inventory/cabang/opname/detail/'.$headers->id)}}" class="button info" align="center">Detail</a>
                                <a href="{{url('inventory/cabang/opname/opname/'.$headers->id)}}"><button type="button" class="button {{$headers->start == 1 ? 'bg-grayLight fg-white' : 'primary'}}" align="center" {{$headers->start == 1 ? 'disabled' : ''}}>Opname</button></a>
                            </center></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="place-right">{!! $header->links() !!}</div>
        </div>
        <div class="cell"></div>
    </div>
</div>
</body>

<div data-role="dialog" id="dialog" class="padding20" data-close-button="true" data-windows-style="true" data-overlay="true" data-overlay-color="op-dark" data-overlay-click-close="true">
    <div class="container">
        <h1 style="color:red">Peringatan!</h1>
        <p>
            Format nomor untuk penerimaan vendor belum disetting, silahkan setting terlebih dahulu!
            <a class="place-right" href="{{url('pengaturan/nomor')}}" ><button class="button warning"><span class="mif-paper-plane mif-ani-float"></span>Klik disini untuk setting!</button></a>
        </p>
    </div>
</div>

<div data-role="dialog" id="dialog2" class="padding20" data-close-button="true" data-windows-style="true" data-overlay="true" data-overlay-color="op-dark" data-overlay-click-close="true">
    <div class="container">
        <h1 style="color:red">Peringatan!</h1>
        <p>
            Format nomor untuk jurnal otomatis belum disetting, silahkan setting terlebih dahulu!
            <a class="place-right" href="{{url('pengaturan/nomor')}}" ><button class="button warning"><span class="mif-paper-plane mif-ani-float"></span>Klik disini untuk setting!</button></a>
        </p>
    </div>
</div>

<script>

    function ceknomor(id){
        $.ajax({
            url: "{!! url('inventory/cabang/opname/ceknomor') !!}",
            data: {},
            dataType: "json",
            type: "get",
            success:function(data)
            {
                if (data[0]["stat"] == "kosong") {
                    var dialog = $(id).data('dialog');
                    dialog.open();
                } else if (data[0]["stat"] == "kosong2") {
                    var dialog2 = $(id).data('dialog2');
                    dialog2.open();
                } else {
                    location.href = "{!! url('inventory/cabang/opname/tambah') !!}";
                }
            }

        });
    };

</script>
</html>
