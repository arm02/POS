@extends('layouts.master')

@section('content')

    <ol class="breadcrumb">
        <li>
            <a href="javascript:;"><i class="ti-home mr5"></i></a>
        </li>
        <li>
            <a href="javascript:;">Master</a>
        </li>
        <li class="active"><a href="{!! url('master/kategori') !!}">Daftar Kategori</a></li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <!-- <header class="panel-heading">Test Panel</header>-->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <a href="{!! url('master/kategori/create') !!}" class="btn btn-primary mb15"><i class="ti ti-plus"></i> Tambah</a>
                                <a href="{!! url('master/kategori/import') !!}" class="btn btn-success mb15"><i class="ti ti-import"></i> Import</a>
                                <a href="{!! url('master/kategori/export') !!}" class="btn btn-warning mb15"><i class="ti ti-export"></i> Export</a>
                            </div>
                            <form class="form-inline" role="form" method="get" action="{{ url('master/kategori/search') }}">
                                <div class="form-group mr5">
                                    <label class="control-label" for="cari">&nbsp;&nbsp;&nbsp;</label>
                                    <input name="query" type="text" class="form-control" placeholder="Cari kategori" value="{{ $query }}" id="cari">
                                </div>
                                <input type="hidden" name="search" value="1">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="ti ti-search"> Cari</i></button>
                                <a href="{!! url('master/kategori') !!}"><button type="button" class="btn btn-color btn-sm"><i class="ti ti-reload"> Reset</i></button></a>
                            </form>
                        </div>
                    </div>

                    <div class="pull-right">
                        Total data ditemukan : {!! $jml !!}
                    </div>
                    @if(session('alert'))
                        <br/><br/>
                        {!! session('alert') !!}
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive no-border">
                                <table class="table table-bordered table-striped no-m">
                                    <thead>
                                    <tr class="bg-color">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kode</th>
                                        <th class="text-center">Nama Kategori</th>
                                        {{--<th class="text-center">ID</th>--}}
                                        <th class="text-center">Option</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = ($kategori->currentPage() - 1) * $kategori->perPage() + 1; ?>
                                    @foreach($kategori as $value)
                                        <tr>
                                            <td class="text-center">{!! $i++ !!}</td>
                                            <td>{!! $value->kode !!}</td>
                                            <td>{!! $value->nama !!}</td>
                                            {{--<td class="text-center" style="background-color: rgba(34, 138, 255, 0.11)">{!! $value->id !!}</td>--}}
                                            <td align="center" class="fa-hover">
                                                <a href="{!! url('master/kategori/'.$value->id.'/edit') !!}" data-toggle="tooltip" data-placement="left" title="Ubah"><i class="ti-pencil mr5" style="color: blue; font-size: medium"></i></a>
                                                <a href="javascript:void(0)" onclick="konfirm({{$value->id}})" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="ti-trash mr5" style="color: red; font-size: medium"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-right">
                                        {{--{!! str_replace('?','?query='.$query.'&',$kategori->links()) !!}--}}
                                        {!! $kategori->appends(['query' => $query])->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>

    <script>
        function konfirm(id) {
            swal({
                        title: "Apakah Anda Yakin?",
                        text: "Data Barang yg termasuk dalam Kategori ini juga akan Terhapus !",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',   cancelButtonColor: '#d33',
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
            }).then(function() {
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
                location.href =  "{{ url('master/kategori') }}/" + id + "/destroy";
            })

        }
    </script>

@stop
