
    <div class="container" id="" style="overflow-y: scroll; height:400px;">
        <table class="dataTable bordered" data-searching="true" style="overflow:auto; width:100%; background-color:#fff;">
            <thead>
            <tr>
                <th class="ribbed-cyan fg-white padding10 text-shadow">No</th>
                <th class="ribbed-cyan fg-white padding10 text-shadow">Barcode</th>
                <th class="ribbed-cyan fg-white padding10 text-shadow">Nama Produk</th>
                <th class="ribbed-cyan fg-white padding10 text-shadow">Tanggal</th>
                <th class="ribbed-cyan fg-white padding10 text-shadow">Merk</th>
                <th class="ribbed-cyan fg-white padding10 text-shadow">Stok</th>
                <th class="ribbed-cyan fg-white padding10 text-shadow">Harga Beli</th>
                <th class="ribbed-cyan fg-white padding10 text-shadow">Harga Jual</th>
                <th class="ribbed-cyan fg-white padding10 text-shadow">QTY</th>
                <th class="ribbed-cyan fg-white padding10 text-shadow" align="center"><input type="checkbox" name="checkAll" id="TableAll" align="center"></th>
            </tr>
            </thead>
            <?php $i = 1; ?>
            <tbody>
            @foreach ($produk as $value)
                <?php $mapro = \App\Model\Master\Mappingbarang::where('id_produk', $value->id)->where('id_cabang', \Illuminate\Support\Facades\Auth::user()->cabang)->first();?>
                <tr>
                    <td>{!! $i++ !!}</td>
                    <td>{!! $value->barcode !!}</td>
                    <td>{!! $value->nama !!}</td>
                    <td>{!! $value->created_at !!}</td>
                    <td>{!! $value->classification !!}</td>
                    <td>{!! $mapro->stok !!}</td>
                    <td>{!! number_format($value->harga_beli, '2') !!}</td>
                    <td>{!! number_format($value->harga_jual, '2') !!}</td>
                    <td><input type="number" style="width:60px;" onkeyup="validAngka(this)" min="1" value="1" name="qty{{$value->id}}"></td>
                    <td><input type="checkbox" placeholder="" name="cbpilih[{{$value->id}}]"/></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



<script>
    $('#TableAll').click(function (e) {
        $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
    });
</script>
