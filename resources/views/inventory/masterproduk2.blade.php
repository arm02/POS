<!DOCTYPE html>
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
        <script src="{{ asset('assets/templateiiinventory/js/jquery.dataTables.min.js') }}"></script>

        <style>
            body{
            margin:0;
            background-color:#fff;
            overflow:auto;
            }
        </style>
        <title>Daftar Produk</title>
    </head>

    <body id="">
        <div class="app-bar navy" data-role="appbar">
            <a class="app-bar-element" href="{!! url('/inventory') !!}"> <img style="height: 28px; display: inline-block; margin-right: 10px;" src="{{asset('assets/templateinventory/images/inventory.png') }}"> Menu Utama</a>
            <a href="{!! url('/login') !!}" class="app-bar-element place-right"> <span class="mif-switch"></span> Log Out</a>
            <span class="app-bar-divider"></span>
            <ul class="app-bar-menu">
        </ul>
        </div>

        <h1 style="margin-left:4%; margin-top:3%;"><a href="{!! url('/inventory') !!}" class="nav-button transform"><span></span></a>&nbsp;Daftar Produk</h1>
        <hr style="width:95%;"><br>
        <div class="grid">
            <div class="row cells12">
                <div class="cell"></div>
                <div class="cell colspan10">
                    <form action="{{url('masterproduk/search')}}" method="get">
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
                                <a href="{!! url('/tambahproduk') !!}" class="place-right"><button class="button success"><span class="mif-paper-plane mif-ani-float"></span>Tambah Produk</button></a>
                            </div>
                        </div>
                    </form>

                    <div class="container" id="" style="overflow-y: scroll; height:400px;width:100%">
                    <table class="dataTable striped hovered cell-hovered border bordered " data-searching="true" style="overflow:auto; height:10%; width:100%; background-color:#fff;">
                        <thead>
                            <tr>
                                <th class="text-center ribbed-cyan fg-white padding10 text-shadow">No</th>
                                <th class="text-center ribbed-cyan fg-white padding10 text-shadow">Barcode</th>
                                <th class="text-center ribbed-cyan fg-white padding10 text-shadow">Nama Produk</th>
                                <th class="text-center ribbed-cyan fg-white padding10 text-shadow">Tanggal</th>
                                <th class="text-center ribbed-cyan fg-white padding10 text-shadow">Klasifikasi</th>
                                <th class="text-center ribbed-cyan fg-white padding10 text-shadow">Stok</th>
                                <th class="text-center ribbed-cyan fg-white padding10 text-shadow">Harga Beli</th>
                                <th class="text-center ribbed-cyan fg-white padding10 text-shadow">Harga Jual</th>
                                <th class="text-center ribbed-cyan fg-white padding10 text-shadow">Unit</th>
                                <th class="text-center ribbed-cyan fg-white padding10 text-shadow" colspan="3" align="center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody style="">
                        <?php $i =  1  ?>
                                         @foreach ($masterp as $value)
                                    <tr>
                                        <td>{!! $i++ !!}</td>
                                        <td>{!! $value->produk !!}</td>
                                        <td>{!! $value->qty !!}</td>
                                        <td>{!! $value->harga !!}</td>
                                        <td>{!! $value->sub_total !!}</td>
                                        <td>{!! $value->barcode !!}</td>
                                        <td>{!! $value->kasir !!}</td>
                                        <td>{!! $value->no_ref !!}</td>
                                        <td>{!! $value->cabang !!}</td>
                                        <td><a href="{!! url('/ubahproduk/'.$value->id) !!}" class="button warning" align="center">Edit</a></td>
                                        <td><a href="{!! url('/deleteproduk/'.$value->id)!!}"class="button danger" data-title="Hapus?" id="delete" align="center">Hapus</a></td>
                                        <td><a href="{!! url('/detail/'.$value->id)!!}"class="button info" align="center">Detail</a></td>
                                    </tr>
                                @endforeach

                                        </tbody>
                    </table>
                        </div>

                    {{--<a class="place-right" onclick="ceknomor('#dialog')" ><button class="button success"><span class="mif-paper-plane mif-ani-float"></span>Tambah Data Pembelian</button></a>--}}


                </div>
                <div class="cell"></div>
            </div>
        </div>
    </body>
</html>
