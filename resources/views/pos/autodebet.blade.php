
<div style="width:100%;height:50%;overflow:hidden;margin:0 auto; position:absolute; margin-top:2%;margin-left:0px;background-color:#3498db  ;">
<div style="font-size:27px;color:#fff;margin-left:2%;position:absolute;"><i>Total Belanja  :</i></div>
<div style="font-size:90px;color:#fff;margin-left:25%;margin-top:5%;"><b>Rp. {!! number_format($total ,2,",",".") !!}</b></div>
</div>
<div style="font-size:20pt;color:#fff;margin-left:40%;margin-top:21.5%;position:absolute;">Nomor Kartu</div>
<div style="font-size:20pt;color:#fff;margin-left:40.2%;margin-top:25.7%;position:absolute;">PIN</div>
<div class="input-control text" style="font-size:16pt; margin-left:650px; top:58.5%;color:black;position:absolute;">
    <input type="text" id="Ekartu" style="width:450px;text-align:center;font-size:14pt;" onkeypress="return hanyaAngka(event, false)" autofocus>
</div>

<div class="input-control text" style="font-size:16pt; margin-left:650px; top:70%;color:black;position:absolute;">
    <input  type="password" id="Epin" style="width:450px;text-align:center;font-size:14pt;" onkeypress="return hanyaAngka(event, false)" autofocus>
</div>
<input type="hidden" id="input" value="{{ $total }}">

<input id="bayar"name="bayarr"type="hidden">
<input type="hidden" id="saldonya">
<input type="hidden" id="norefnya">
<input type="hidden" id="kartu" style="height:5%;margin-top:30%">
<button id="transaksi" type="submit" style="border:none;width:10%;height:10%;margin-top:28.5%;margin-left:848px;background-color:#3498db;text-align:center;color:#fff;position:absolute;font-size:20px;cursor:pointer;">OK</button>
<button id="batal"  style="border:none;width:10%;height:10%;margin-top:28.5%;margin-left:978px;background-color:#c0392b;text-align:center;color:#fff;position:absolute;font-size:20px;cursor:pointer;">Batal</button>

<script type="text/javascript">

$("#batal").click(function(){
            $("#divpayment").load("{!! URL::to('/pos/payment') !!}/"+$('#input').val() + "/" + $('#jenis1').val() + "/" + $('#jenis2').val() + "/" +  $('#jenis3').val() + "/" + $('#norefnya').val());
});

$('#transaksi').on('click', function () {   

          $.ajax({
              url: "{!! url('pos/autodebet/transaksi') !!}/"+$('#Ekartu').val() + "/" + $('#Epin').val() + "/" + $('#norefnya').val(),
              data: {},
              dataType: "json",
              type: "get",
              success:function(data)
              {
                  if(data[0]["stat"]== "Fail")
                  {
                  sweetAlert("Oops...", "No. Kartu/PIN salah!", "error");
                  }else{

                $('#saldonya').val(data[0]["saldo"]);
                $('#kartu').val(data[0]["kartu"]);
                $('#norefnya').val(data[0]["norefnya"]);
                $("#divpayment").load("{!! URL::to('pos/autodebets') !!}/" + $('#saldonya').val() + "/" + $('#kartu').val() + "/" + $('#norefnya').val());
                  }
              }
          });
      });
</script>
