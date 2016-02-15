var faktur=$("#faktur").val();
            gettotal();
            $("body").on("change","#id_supplier",function(){
                reset_barang(enkrip);
                
            });
            $("body").on("change","#id_customer",function(){
                
                c = $(this).val();
                // alert(c);
                cek_order(c);
            });
            $("#id_mitra").change(function(){
                 var that = this,
                            v = $(this).val();        
                            // alert(v);
                            get_kandang(v);
                            get_gudang(v);
            });
             $("#jenis").change(function(){
                            var that = this,
                            v = $(this).val();        
                            get_barang(v);
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
            $("#id_barang_jadi").change(function(){
                            var that = this,
                            v = $(this).val();
                            var urls=brgsatuurl+"satuan_barang/"+v+"/";
                            // alert(urls);
                            $("#id_satuan_jadi").attr("data-load-satuan",urls);
                            $("#id_satuan_jadi").attr("data-id",v);
                            get_satuan_jadi(v); 
                            console.clear();
                    });
            $(".barangjadi #jumlah").change(function(){
                
              
              
                totaljadi();
            }); 
            $(".barangjadi #harga").change(function(){
               
             
                totaljadi();
            });
             var Tabeltrx = $("#data").DataTable({
                        "ajax":{
                            "url":baseurl+"getdetail/"+enkrip+"/"+faktur,
                            // "url":baseurl+"getdetail/"+enkrip+"/"+enfaktur,
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
                $("body").on("click",".btn-add-assy",function(e){
                    e.preventDefault();
                   
                    var faktur = $("#faktur").val();
                    var kode = $("#id_barang").val();
                    var tanggalstok= $("#tanggal").val();
                    var qty = $("#jumlah_satuan").val();
                    var satuan = $("#id_satuan").val();
                
                    
                    var datax={faktur:faktur,id_barang:kode,jumlah_satuan:qty,tanggal:tanggalstok,id_satuan:satuan,ajax:1};
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
                                gettotal_telur();

                            } });
                        });
                    console.clear();
                });
                $("body").on("click",".btn-add-req",function(e){
                    e.preventDefault();
                   
                    var faktur = $("#faktur").val();
                    var kode = $("#id_barang").val();
                    var qty = $("#jumlah").val();
                    var satuan = $("#id_satuan").val();
                    var ket= $("#ket_detail").val();
                
                    
                    var datax={faktur:faktur,id_barang:kode,jumlah:qty,id_satuan:satuan,ket_detail:ket,ajax:1};
                    $(this).ready(function(){
                        $.ajax({
                            url:baseurl+"submit_detail/"+enkrip,
                            data:datax,
                            type:"POST",
                            success:function(msg){
                                //alert(msg);
                                $("#id_barang").prop("value","");
                                $("#jumlah").prop("value","");
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
                $("body").on("click",".btn-add-fix",function(e){
                    e.preventDefault();
                   
                    var faktur = $("#faktur").val();
                    var kode = $("#id_barang").val();
                    var qty = $("#jumlah").val();
                    var qty1 = $("#jumlah_baru").val();
                    var satuan = $("#id_satuan").val();
                    var ket= $("#ket_detail").val();
                
                    
                    var datax={faktur:faktur,id_barang:kode,jumlah:qty,jumlah_baru:qty1,id_satuan:satuan,ket_detail:ket,ajax:1};
                    $(this).ready(function(){
                        $.ajax({
                            url:baseurl+"submit_detail/"+enkrip,
                            data:datax,
                            type:"POST",
                            success:function(msg){
                                //alert(msg);
                                $("#id_barang").prop("value","");
                                $("#jumlah").prop("value","");
                                $("#jumlah_baru").prop("value","");
                                $("#ket_detail").prop("value","");
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
                $("body").on("click",".btn-add-so",function(e){
                    e.preventDefault();
                   
                    var faktur = $("#faktur").val();
                    var kode = $("#id_barang").val();
                    var qty = $("#jumlah_satuan").val();
                    var harga= $("#harga_jual").val();
                    var satuan = $("#id_satuan").val();
                
                    
                    var datax={faktur:faktur,id_barang:kode,harga_jual:harga,jumlah:qty,id_satuan:satuan,ajax:1};
                    $(this).ready(function(){
                        $.ajax({
                            url:baseurl+"submit_detail/"+enkrip,
                            data:datax,
                            type:"POST",
                            success:function(msg){
                                //alert(msg);
                               
                                $("#jumlah_satuan").prop("value","");
                                $("#harga_jual").prop("value","");
                              
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
                $("body").on("click",".btn-add-brgjadi",function(e){
                    e.preventDefault();
                   
                    var faktur = $("#faktur").val();
                    var kode = $("#id_barang_jadi").val();
                    var tanggalstok= $("#tanggal").val();
                    var qty = $("#jumlah").val();
                    var satuan = $("#id_satuan_jadi").val();
                
                    
                    var datax={faktur:faktur,id_barang:kode,jumlah_satuan:qty,pertama:1,tanggal:tanggalstok,id_satuan:satuan,ajax:1};
                    $(this).ready(function(){
                        $.ajax({
                            url:baseurl+"submit_detail/"+enkrip,
                            data:datax,
                            type:"POST",
                            success:function(msg){
                                //alert(msg);
                         /*       $("#id_barang").prop("value","");
                                $("#jumlah_satuan").prop("value","");
                                $("id_satuan").prop("value","");*/
                                // $("#faktur_po").prop("value","");
                               /* $("id_satuan option").prop("selected", function() {
                                    return this.defaultSelected;
                                });
                                $("#id_barang option").prop("selected", function() {
                                    return this.defaultSelected;
                                });*/
                                Tabeltrx.clear(0).draw();
                                gettotal_telur();

                            } });
                        });
                    // console.clear();
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
                 $("body").on("click",".btn-gunakan",function(e){
                        fakturso=$(this).data("faktur");
                        fakturtrx=$("#faktur").val();
                        $.post(baseurl+'getorderdetail/'+enkrip+"/"+fakturso+"/"+fakturtrx, function (data) {
                        // alert(idso);
                            $("#ref").val(fakturso);
                            Tabeltrx.clear(0).draw();    
                            gettotal();
                        });
                    });
                $("#modal-notif").on("hidden.bs.modal", function(){
                        $(this).data("modal", null);
                            window.location=baseurl;
                    });
            function get_barang(id){
                $("select#id_barang option").remove();
                $.getJSON(baseurl+'get_drop_barang/'+enkrip+"/"+id, function (data) {
                         $.each(data, function (index, item) {
                             $("#id_barang").append(
                                  $("<option></option>").val(index).html(item)
                              );
                         });
                     });
                console.clear();
            }
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
            function get_satuan_jadi(id){
                $("select#id_satuan_jadi option").remove();
                 $.getJSON(baseurl+"dropdown_satuan/"+id, function (data) {
                         $.each(data, function (index, item) {
                             $("#id_satuan_jadi").append(
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
            function totaljadi(){ //untuk perhitungan assembly

                var hrg=$(".barangjadi #harga").val();
                var jml=$(".barangjadi #jumlah").val();
                // alert(hrg);
                // alert(jml*hrg); 
                if(!hrg){
                    var hrg=0;
                }else if(!jml){
                    var jml=0;
                }else if(hrg>0 && jml>0){
                    var tot=hrg*jml;
                }else{
                    var tot=0;
                }
                if(tot>0){
                    $(".barangjadi #total_jadi").val(tot).trigger("change");;
                    $(".barangjadi #total_jadix").val(accounting.formatMoney(tot,"Rp ",2)).trigger("change");
                }else{
                    $(".barangjadi #total_jadi").val(0).trigger("change");;
                    $(".barangjadi #total_jadix").val(0).trigger("change");;

                }
                // alert(tot);
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
                            // $("#jumlah").val(va.jumlah).trigger("change");
                            $("#totalx").val(accounting.formatMoney(va.total,"Rp ",2)).trigger("change");
                        }else{
                             $("#total").val(0).trigger("change");
                             // $("#jumlah").val(0).trigger("change");
                             $("#totalx").val(0).trigger("change");
                        }
                    }
                );
                // console.clear();
            };

            function reset_barang(enkrip){
                var sp=$("#id_supplier").val();
                // alert(sp);
                get_barang(sp);
            }
            function get_barang(id){
                $("select#id_barang option").remove();
                $.getJSON(baseurl+'get_drop_barang/'+enkrip+"/"+id, function (data) {
                         $.each(data, function (index, item) {
                             $("#id_barang").append(
                                  $("<option></option>").val(index).html(item)
                              );
                         });
                     });
                console.clear();
            }
            function cek_order(id){
                $.getJSON(baseurl+'getorder/'+enkrip+"/"+id, function (data) {
                        // alert(data.faktur);
                        
                         if(data>0){
                            alert("Customer ini memiliki Sales Order, Gunakan?");
                            var Tabelso = $(".table-so").DataTable({
                                "ajax":{
                                    "url":baseurl+"tabelorder/"+enkrip+"/"+id,
                                    // "url":baseurl+"getdetail/"+enkrip+"/"+enfaktur,
                                    "dataType": "json"
                                },
                                "sServerMethod": "POST",
                                "bServerSide": true,
                                 "paging":   false,
                                "deferRender": true,
                                "bFilter":false,
                                 "ordering": false,  
                            });
                            // var po_url=baseurl+'tabelorder/'+enkrip+"/"+id+"/";
                            // Tabeltrx.ajax.url(po_url).load();
                             $("#modal-panel").modal("show");

                             // $("#modal-panel .modal-body").html("oke");
                         }
                     });
                   /* $( "#modal-panel" ).on('shown.bs.modal', function(){
                                alert("I want this to appear after the modal has opened!");
                            });*/
                    $("#modal-panel").on("hidden.bs.modal", function(){
                        $(this).data("modal", null);
                        $(this).removeData('bs.modal');
                        $(".table-so").DataTable().destroy();
                    });
                   


            }
            function hitung() {

            // ((a < b) ? 2 : 3);
                    // var totalx=accounting.formatMoney($("#uangmuka").val(),"Rp",2);

                    var ttotal=(accounting.unformat($("#totalx").val())>0?accounting.unformat($("#totalx").val()):0);
                    var rpum=(accounting.unformat($("#uangmukax").val())>0?accounting.unformat($("#uangmukax").val()):0);
                    var rpbiaya=(accounting.unformat($("#biayakirimx").val())>0?accounting.unformat($("#biayakirimx").val()):0);
                    var ppn=($("#ppn").val()>0?$("#ppn").val():0);
                    // var kirim=($("#biayakirim").val()>0?$("#biayakirim").val():0);
                    var kirim=(rpbiaya>0?rpbiaya:0);
                    gtotalppn=parseFloat(ttotal) + parseFloat((ppn/100) * parseFloat(ttotal));
                    gtotal=gtotalppn + parseFloat(kirim);
                    $("#uangmuka").prop("value",rpum);
                    $("#biayakirim").prop("value",rpbiaya);
                    $("#grandtotal").prop("value",gtotal);
                    $("#grandtotalx").prop("value",accounting.formatMoney(gtotal,"Rp",2));
                    // $("#uangmuka").prop("value",totalx);

                    //hitung UM dan Sisa
                    // var unformat_um=accounting.unformat($("#uangmuka").val();
                     var um=(rpum>0?rpum:0);
                     var sisa=gtotal - parseFloat(um);
                     // alert(sisa);
                     $("#sisa").prop("value",sisa);
                     $("#sisax").prop("value",accounting.formatMoney(sisa,"Rp",2));

        }