@extends('layouts.master')

@section('content')

    <ol class="breadcrumb">
        <li>
            <a href="javascript:;"><i class="ti-home mr5"></i></a>
        </li>
        <li>
            <a href="javascript:;">Laporan</a>
        </li>
        <li class="active"><a href="{url}/laporan/keuangan/neracasaldo">Neraca Saldo</a></li>
    </ol>
    <div class="row">

        <div class="col-md-12">
            <section class="panel no-b">
                <div class="panel-body">
                    <form role="form" class="form-horizontal" method="post">

                        <div class="box-tab">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#umum" data-toggle="tab">Laporan Neraca Saldo</a>
                                </li>
                                <li><a href="#pilih" data-toggle="tab">Pilih Laporan</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="umum">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="dari" class="col-sm-3 control-label">Tanggal Neraca</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input name="dari" type="text" class="form-control datepicker" id="dari" value="01/01/2015">
                                                        <span class="input-group-addon">s/d</span>
                                                        <input name="ke" type="text" class="form-control datepicker" id="ke" value="01/01/2015">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="urut" class="col-sm-3 control-label"></label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span>Periode  :  </span>
                                                        <input name="dari" type="text" value="" placeholder="01/01/2015" disabled>
                                                        <span> s/d </span>
                                                        <input name="ke" type="text" value="" placeholder="31/12/2015" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pilih">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pilih" class="col-sm-1 control-label"></label>
                                                <div class="col-sm-10 icheck">
                                                    <div class="mb5 mt5">
                                                        <input tabindex="1" type="radio" id="radio1" name="pilih">
                                                        <label for="radio1"><i class="fa fa-file-text-o mr5"></i>Laporan Neraca Saldo</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <a href="{url}/laporan/keuangan/neracasaldo/preview" target="_blank" class="btn btn-sm btn-warning mb15"><i class="fa fa-file-text-o mr5"></i>Preview</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <a href="{url}/laporan/keuangan/neracasaldo/cetak" target="_blank" class="btn btn-sm btn-info mb15"><i class="ti-printer mr5"></i>Cetak</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="pull-right">
                                <div class="col-sm-2">
                                    <a href="{url}/laporan/keuangan/neracasaldo" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>


@stop
