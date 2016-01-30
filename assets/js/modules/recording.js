var faktur=$("#faktur").val();
            gettotal();
            $("#id_mitra").change(function(){
                 var that = this,
                            v = $(this).val();        
                            // alert(v);
                            get_kandang(v);
                            get_gudang(v);
            });
            $("#id_barang").change(function(){
                            var that = this,
                            v = $(this).val();
                            var urls=brgsatuurl+"satuan_barang/"+v+"/";
                            // alert(urls);
                            $("#id_satuan").attr("data-load-satuan",urls);
                            $("#id_satuan").attr("data-id",v);
                            get_satuan(v); 
                            console.clear();
                    });
             var Tabeltrx = $("#data").DataTable({
                        "ajax":{
                            "url":baseurl+"getdetail/"+enkrip+"/"+faktur,
                            "dataType": "json"
                        },
                        "sServerMethod": "POST",
                        "bServerSide": true,
                         "paging":   false,
                        "deferRender": true,
                        "bFilter":false,
                         "ordering": false,  
                    });
                $("body").on("click",".btn-add",function(e){
                    e.preventDefault();
                   
                    var faktur = $("#faktur").val();
                    var kode = $("#id_barang").val();
                    var qty = $("#jumlah_satuan").val();
                    var satuan = $("#id_satuan").val();
                    var usia = $("#usia").val();
                    
                    var datax={id_barang:kode,jumlah_satuan:qty,id_satuan:satuan,usia:usia,faktur_recording:$("#faktur").val(),ajax:1};
                    $(this).ready(function(){
                        $.ajax({
                            url:baseurl+"submit_detail/"+enkrip,
                            data:datax,
                            type:"POST",
                            success:function(msg){
                                //alert(msg);
                                $("#id_barang").prop("value","");
                                $("#jumlah_satuan").prop("value","");
                                $("id_satuan").prop("value","");
                                // $("#faktur_po").prop("value","");
                                $("id_satuan option").prop("selected", function() {
                                    return this.defaultSelected;
                                });
                                $("#id_barang option").prop("selected", function() {
                                    return this.defaultSelected;
                                });
                                Tabeltrx.clear(0).draw();
                                gettotal();

                            } });
                        });
                    console.clear();
                }); 
                $("body").on("click",".btn-add-telur",function(e){
                    e.preventDefault();
                   
                    var faktur = $("#faktur").val();
                    var kode = $("#id_barang").val();
                    var tanggalstok= $("#tanggal").val();
                    var butir = $("#jumlah_butir").val();
                    var qty = $("#jumlah_total").val();
                    var satuan = $("#id_satuan").val();
                    var usia = $("#usia").val();
                    var keterangan = $("#keterangan").val();
                    
                    var datax={id_barang:kode,jumlah_total:qty,keterangan:keterangan,jumlah_butir:butir,tanggal:tanggalstok,faktur_ref:$("#faktur").val(),id_satuan:satuan,usia:usia,faktur_recording:$("#faktur").val(),ajax:1};
                    $(this).ready(function(){
                        $.ajax({
                            url:baseurl+"submit_detail/"+enkrip,
                            data:datax,
                            type:"POST",
                            success:function(msg){
                                //alert(msg);
                                $("#id_barang").prop("value","");
                                $("#jumlah_butir").prop("value","");
                                $("#jumlah_total").prop("value","");
                                $("id_satuan").prop("value","");
                                // $("#faktur_po").prop("value","");
                                $("id_satuan option").prop("selected", function() {
                                    return this.defaultSelected;
                                });
                                $("#id_barang option").prop("selected", function() {
                                    return this.defaultSelected;
                                });
                                Tabeltrx.clear(0).draw();
                                gettotal_telur();

                            } });
                        });
                    console.clear();
                });
                 $("body").on("click",".del_detail",function(e){
                    e.preventDefault();
                    var del_data={id:$(this).attr("id"),ajax:1}
                    if(confirm("Anda Yakin Ingin Menghapus Item Ini?")){
                    $(this).ready(function(){
                            
                                $.ajax({
                                    url: baseurl+"delete_detail",
                                    type: "POST",
                                    data: del_data,
                                    success:function(msg){
                                         // $(".tabletemp").DataTable().clear(0).draw();                      
                                         Tabeltrx.clear(0).draw();    
                                         gettotal();
                                    }
                                });
                            });
                        }
                });
                $("body").on("click","#cancel",function(e){
                    e.preventDefault();
                    var del_data={faktur:$("#faktur").val(),ajax:1}
                    if(confirm("Anda Yakin Ingin Membatalkan Recording?")){
                    $(this).ready(function(){
                            
                                $.ajax({
                                    url: baseurl+"delete_bukti",
                                    type: "POST",
                                    data: del_data,
                                    success:function(msg){
                                         // $(".tabletemp").DataTable().clear(0).draw();                      
                                         Tabeltrx.clear(0).draw();    
                                         gettotal();
                                    }
                                });
                            });
                        }
                });
                $("#modal-notif").on("hidden.bs.modal", function(){
                        $(this).data("modal", null);
                            window.location=baseurl;
                    });
            function get_kandang(id){
                $("select#id_kandang option").remove();
                $.getJSON(baseurl+"get_dropdown_kandang/"+enkrip+"/"+id, function (data) {
                         $.each(data, function (index, item) {
                             $("#id_kandang").append(
                                  $("<option></option>").val(index).html(item)
                              );
                         });
                     });
                console.clear();
            }
            function get_satuan(id){
                $("select#id_satuan option").remove();
                 $.getJSON(baseurl+"dropdown_satuan/"+id, function (data) {
                         $.each(data, function (index, item) {
                             $("#id_satuan").append(
                                  $("<option></option>").val(index).html(item)
                              );
                         });
                     });
                console.clear();
            }
            function get_gudang(id){
                $("select#id_gudang option").remove();
                $.getJSON(baseurl+"get_dropdown_gudang/"+enkrip+"/"+id, function (data) {
                         $.each(data, function (index, item) {
                             $("#id_gudang").append(
                                  $("<option></option>").val(index).html(item)
                              );
                         });
                     });
                console.clear();
            }
            function gettotal(){
                var faktur=$("#faktur").val();
                //alert(faktur);
                $.get(baseurl+"get_total/"+enkrip+"/"+faktur, 
                    function(dt, status){
                        var va=JSON.parse(dt);
                        if(va.total>0){
                            $("#total").val(va.total).trigger("change");
                            $("#totalx").val(accounting.formatMoney(va.total,"Rp ",2)).trigger("change");
                        }else{
                             $("#total").val(0).trigger("change");
                             $("#totalx").val(0).trigger("change");
                        }
                    }
                );
                console.clear();
            };
            function gettotal_telur(){
                var faktur=$("#faktur").val();
                //alert(faktur);
                $.get(baseurl+"get_total/"+enkrip+"/"+faktur, 
                    function(dt, status){
                        var va=JSON.parse(dt);
                        if(va.total>0){
                            $("#total").val(va.total).trigger("change");
                            $("#jumlah").val(va.jumlah).trigger("change");
                            $("#totalx").val(accounting.formatMoney(va.total,"Rp ",2)).trigger("change");
                        }else{
                             $("#total").val(0).trigger("change");
                             $("#jumlah").val(0).trigger("change");
                             $("#totalx").val(0).trigger("change");
                        }
                    }
                );
                console.clear();
            };