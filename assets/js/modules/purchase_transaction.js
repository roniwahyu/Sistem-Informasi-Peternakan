

$("document").ready(function(){  
           
            var fakturpt=$("#faktur_pt").val();
           
            
            $("body").on("change","#id_tipe_beli",function(){
                if($(this).val()=="2"){
                    $(".panel_tambah").fadeOut(200);
                    $("#bypo").fadeIn(200);    
                }else{
                    $(".panel_tambah").fadeIn(200);
                    $("#bypo").fadeOut(200);
                }    
            });
          
            $("body").on("change","#id_supplier",function(){
                var trx=$("#id_tipe_beli");
                c = $(this).val();
                cek_order(c);
                if(trx=="1"){
                    reset_barang(enkrip);
                }
            });

             $("#id_supplier").change(function(){
                            var that = this,
                            v = $(this).val();        
                            get_barang(v);
                    });  
                    $("#Kode").change(function(){
                            var that = this,
                            v = $(this).val();
                            var urls=brgsatuurl+"satuan_barang/"+v+"/";
                            var hrgurl=brgharga+"harga_barang/"+enkrip+"/"+v+"/";
                            // alert(urls);
                            $("#addsatuan").attr('data-load-satuan',urls);
                            $(".setup_harga").attr('data-load-harga',hrgurl);
                            $(".setup_harga").attr('data-id',v);
                            $("#addsatuan").attr('data-id',v);
                            get_satuan(v); 
                            console.clear();
                    });
                    var Tabeltrx = $("#data").DataTable({
                        "ajax":{
                            "url":baseurl+'pt_detail/'+enkrip+"/"+fakturpt+"",
                            "dataType": "json"
                        },
                        "sServerMethod": "POST",
                        "bServerSide": true,
                         "paging":   false,
                        "deferRender": true,
                        "bFilter":false,
                         "ordering": false,  
                    });
                    var Temptbl = $("#datax.tabelpo").DataTable({
                        "ajax":{
                            "url":baseurl+'getdatapo/'+enkrip,
                            "dataType": "json"
                        },
                        "sServerMethod": "POST",
                        "bServerSide": true,
                        
                    });

                $("body").on("click",".loadpo", function (e) {
                    
                    Temptbl.ajax.url(baseurl+"getdatapo/"+enkrip).load();
                });
            
            $("body").on("click","[data-load-faktur]",function(e) {
                e.preventDefault();
              
                var $this = $(this);
                var faktur = $this.data("load-faktur");
                var nofaktur = $this.data("faktur");
               
                var id=$(this).attr("id");
                var po_url=baseurl+'get_po_detail/'+nofaktur+"/"+enkrip+"/";
               
                if(faktur) {
                    // $($this.data("faktur-target")).load(faktur);
                    $("#faktur_po").prop("value",nofaktur);
                    $("#faktur_po").prop("readonly",true);
                    $("#id_po").prop("value",id);

                    Tabeltrx.ajax.url(po_url).load();
                    
                    
                }
                 
                get_po(id);

                console.clear();
            });
             $('body').on('click','.add_satuan',function(e) {
                e.preventDefault();
                var target=$(this).attr('data-remote-target');
                satuan=$(this).attr('data-load-satuan');
                id=$(this).attr('data-id');

                // alert(satuan);
                var $this = $(this);
                $($this.data('remote-target')).load(satuan,function(e){
                    $("#modal-satuan").modal('show');
                });

                // $(this).attr('data-remote-target').load(satuan);
                // target.load(satuan);
                // $().load();
              /*  
                
                satuid = $this.data('load-satuan');
                var targets= $this.data('remote-target');
                id= $this.data('id');
                var forms= $this.data('form');
                alert(id);  
                if(satuid) {
                   
                    
                    // targets.load(satuid);
                }*/


            });
             $('body').on('click','.setup_harga',function(e) {
                e.preventDefault();
                var target=$(this).attr('data-remote-target');
                harga=$(this).attr('data-load-harga');
                id=$(this).attr('data-id');

                // alert(harga);
                var $this = $(this);
                $($this.data('remote-target')).load(harga,function(e){
                    $("#modal-harga").modal('show');
                });
              
            });
            $("body").on("click",".generate_pt",function(e){
                    e.preventDefault();
                    new_faktur();
                }); 
            $("body").on("click",".baru",function(e){
                    e.preventDefault();
                    new_faktur();
                    Tabeltrx.clear(0).draw();
                }); 
            $("body").on("click","#save_supplier",function(e){
                    e.preventDefault();
                    save_supplier(enkrip);
                });
            $("body").on("click","#save_barang",function(e){
                    e.preventDefault();
                    save_barang(enkrip);
                    reset_barang(enkrip);
                }); 
            $("body").on("click","#save_satuan",function(e){
                    e.preventDefault();
                    save_satuan(enkrip);
                    
                }); 
            $("body").on("click","#save_harga",function(e){
                    e.preventDefault();
                    save_harga(enkrip);
                    
                });
            $("body").on("click",".edite",function(e){
                    // e.preventDefault();
                    $("#save").fadeOut(200);
                    $("#save_edit").fadeIn(200);

                    
                });
            $("body").on("click",".gen_kdsp",function(e){
                    e.preventDefault();
                    
                    gen_kdsp(enkrip);
                    
                    
                });
            
            $("body").on("click",".refresh_barang",function(e){
                    e.preventDefault();
                    reset_barang();
            });
            
            $("#modal-form").on("shown.bs.modal", function (e) {
                        // alert("shown");
                        gen_kdsp(enkrip);
            });  
            $("#modal-satuan").on("close.bs.modal", function (e) {
                        // alert("shown");
                        $("#modal-satuan .modal-body").html("<br>");
            }); 
            $("#modal-barang").on("shown.bs.modal", function (e) {
                        // alert("shown");
                        var idsp=$("#id_supplier").val();
                        // alert(idsp);
                        $.get(spurl+'get/'+idsp+"/"+enkrip, function(kdsp, status){
                            var sp = JSON.parse(kdsp);
                            // alert(sp.Kode);
                            $("form#form_barang #id_supplier" ).find( "option[value="+sp.Kode+"]" ).prop( {selected: true,disabled:false} ); 
                        });

                        // gen_kdbarang(enkrip);
            }); 
            $("body").on("click",".btn-add",function(e){
                    e.preventDefault();
                    // alert(isedit);
                    var faktur = $("#faktur_pt").val();
                    var kode = $("#Kode").val();
                    var qty = $("#Qty").val();
                    var satuan = $("#Satuan").val();
                    
                    var datax={id_barang:kode,jumlah:qty,id_satuan:satuan,pt:$("#faktur_pt").val(),ajax:1};
                    $(this).ready(function(){
                        $.ajax({
                            url:baseurl+"submit_detail/"+enkrip,
                            data:datax,
                            type:"POST",
                            success:function(msg){
                                //alert(msg);
                                $("#Kode").prop("value","");
                                $("#Qty").prop("value","");
                                $("#Satuan").prop("value","");
                                // $("#faktur_po").prop("value","");
                                $("#Satuan option").prop("selected", function() {
                                    return this.defaultSelected;
                                });
                                $("#Kode option").prop("selected", function() {
                                    return this.defaultSelected;
                                });
                                Tabeltrx.clear(0).draw();
                                gettotal();

                            } });
                        });
                    console.clear();
                });
            $("body").on("click",".delete_temp",function(e){
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
            $("body").on("change","#form_barang #id_golongan",function(e){
                e.preventDefault();
                var idgol=$("#form_barang #id_golongan").val();
                $.get(jnsbrgurl+'get_new_jenis/'+enkrip+"/"+idgol+"/", function(kd, status){
                    $("#form_barang #Kode").prop("value",kd);
                });    
            });
            console.clear();
        }); //endof document ready
        function gen_kdsp(enkrip){
             $.get(baseurl+'get_sp_id/'+enkrip, function(kdsp, status){
                        
                        // var kd=kdsp;
                        // alert(newfaktur);
                        // alert(kdsp);
                        $("#add_supplier_form #Kode").prop("value",kdsp);
                    });
            console.clear(); 
        }
        function gen_kdbarang(enkrip){
             $.get(baseurl+'get_kdbarang/'+enkrip, function(kdbarang, status){
                        
                        // var kd=kdbarang;
                        // alert(newfaktur);
                        // alert(kdbarang);
                        $("#form_barang #Kode").prop("value",kdbarang);
                    });
            console.clear();
        }
        function generate_kdbarang(){
            var idsp=$("#form_barang #id_supplier").val();
            console.clear();
        }
        function save_supplier(enkrip){
                var data_sp = $("form#add_supplier_form").serializeArray();
                data_sp.push({name:"ajax",value:1});
                $(this).ready(function(){
                    $.ajax({
                        url:spurl+'submit/'+enkrip,
                        data:data_sp,
                        type:"POST",

                        success:function(data){
                            var json = JSON.parse(data);
                            // alert(json.id_supplier);
                            $("#id_supplier").append($("<option></option>").val(json.id_supplier).html(json.Kode+" ("+json.Nama+")"));
                            $("#id_supplier" ).find( "option[value="+json.id_supplier+"]" ).prop( {selected: true,disabled:false} ); 
                            // $("#id_supplier").append($("<option></option>").val(data.id_supplier).html(data.Nama));
                            //get_supplier();
                        }
                    });
                });
                console.clear();
            }
        function save_satuan(enkrip){
                var data_sp = $("#addform_satuan").serializeArray();
                data_sp.push({name:"ajax",value:1});
                $(this).ready(function(){
                    $.ajax({
                        url:brgsatuurl+'submit/'+enkrip,
                        data:data_sp,
                        type:"POST",

                        success:function(data){
                            // var json = JSON.parse(data);
                            // alert(data);
                            // $("#id_supplier").append($("<option></option>").val(json.id_supplier).html(json.Kode+" ("+json.Nama+")"));
                            // $("#id_supplier" ).find( "option[value="+json.id_supplier+"]" ).prop( {selected: true,disabled:false} ); 
                            // $("#id_supplier").append($("<option></option>").val(data.id_supplier).html(data.Nama));
                            //get_supplier();
                        }
                    });
                });
                console.clear();
            }
        function save_harga(enkrip){
                var data_sp = $("#addform_harga").serializeArray();
                data_sp.push({name:"ajax",value:1});
                $(this).ready(function(){
                    $.ajax({
                        url:brgharga+'submit/'+enkrip,
                        data:data_sp,
                        type:"POST",

                        success:function(data){
                            // var json = JSON.parse(data);
                            // alert(data);
                            // $("#id_supplier").append($("<option></option>").val(json.id_supplier).html(json.Kode+" ("+json.Nama+")"));
                            // $("#id_supplier" ).find( "option[value="+json.id_supplier+"]" ).prop( {selected: true,disabled:false} ); 
                            // $("#id_supplier").append($("<option></option>").val(data.id_supplier).html(data.Nama));
                            //get_supplier();
                        }
                    });
                });
                console.clear();
            }
        function save_barang(enkrip){
                var data_sp = $("form#form_barang").serializeArray();
                data_sp.push({name:"ajax",value:1});
                $(this).ready(function(){
                    $.ajax({
                        url:brgurl+'submit/'+enkrip,
                        data:data_sp,
                        type:"POST",

                        success:function(data){
                            var json = JSON.parse(data);
                            // alert(json.id);
                            // $("#id_supplier").append($("<option></option>").val(json.id_supplier).html(json.Nama+" ("+json.Kode+")"));
                            $("#Kode" ).find( "option[value="+json.id+"]" ).prop( {selected: true,disabled:false} ); 
                            // $("#id_supplier").append($("<option></option>").val(data[id_supplier).html(data.Nama));
                            //get_supplier();

                        }
                    });
                });
                console.clear();
            }
        function reset_barang(enkrip){
                var sp=$("#id_supplier").val();
                // alert(sp);
                get_barang(sp);
            }
        function get_barang(id){
                $("select#Kode option").remove();
                $.getJSON(pourl+'get_drop_barang/'+enkrip+"/"+id, function (data) {
                         $.each(data, function (index, item) {
                             $("#Kode").append(
                                  $("<option></option>").val(index).html(item)
                              );
                         });
                     });
                console.clear();
            }
        function get_satuan(id){
                $("select#Satuan option").remove();
                 $.getJSON(pourl+'dropdown_satuan/'+id, function (data) {
                         $.each(data, function (index, item) {
                             $("#Satuan").append(
                                  $("<option></option>").val(index).html(item)
                              );
                         });
                     });
                console.clear();
            }
            function gettotal(){
                var pt=$("#faktur_pt").val();
                //alert(pt);
                $.get(baseurl+"get_pt_detail_total/"+enkrip+"/"+pt, 
                    function(dt, status){
                        if(dt>0){
                            $("#totalbayar").val(dt).trigger('change');
                            $("#totalbayarx").val(accounting.formatMoney(dt,"Rp ",2)).trigger('change');
                        }else{
                             $("#totalbayar").val(0).trigger('change');
                             $("#totalbayarx").val(0).trigger('change');
                        }
                    }
                );
                console.clear();
            };
        function hitung() {

            // ((a < b) ? 2 : 3);
                    var ttotal=(accounting.unformat($("#totalbayarx").val())>0?accounting.unformat($("#totalbayarx").val()):0);
                    var ppn=($("#ppn").val()>0?$("#ppn").val():0);
                    var kirim=($("#biayakirim").val()>0?$("#biayakirim").val():0);
                    gtotalppn=parseFloat(ttotal) + parseFloat((ppn/100) * parseFloat(ttotal));
                    gtotal=gtotalppn + parseFloat(kirim);
                    $("#grandtotal").prop("value",gtotal);
                    $("#grandtotalx").prop("value",accounting.formatMoney(gtotal,"Rp",2));

                    //hitung UM dan Sisa
                     var um=($("#uangmuka").val()>0?$("#uangmuka").val():0);
                     var sisa=gtotal - parseFloat(um);
                     // alert(sisa);
                     $("#sisa").prop("value",accounting.formatMoney(sisa,"Rp",2));

        }
       
        function get_po(id){
            $.get(pourl+'get/'+id, function(data){
                    var json = JSON.parse(data);
                    var idsp=json.id_supplier;
                    
                    $("#id_supplier" ).find( "option[value="+idsp+"]" ).prop( {selected: true,disabled:false} ); 
                    // $("#id_supplier" ).find( "option[value="+idsp+"]" ).prop( "disabled", false ); 
                    $("#id_supplier option:not(:selected)").attr("disabled",true); 
                    
                    $("#totalbayar").prop("value",json.totalbayar);
                    $("#totalbayarx").prop("value",accounting.formatMoney(json.totalbayar,"Rp",2));

                });
            console.clear();    
        }
        function get_supplier(){
            $.get(baseurl+'get_dropdown_supplier/', function(data){
                $.each(data, function(i, datax){
                     $("#id_supplier").append($("<option></option>").val(i).html(datax));
               
                });
            });
        }
        function new_faktur(){
                 $.get(baseurl+'get_new_pt/', function(newpo, status){
                    $("#faktur_pt").prop("value",newpo);
                    var newfaktur=newpo;
                    // alert(newfaktur);
                });
            };

            function cek_order(id){
                $.getJSON(baseurl+'getorder/'+enkrip+"/"+id, function (data) {
                        // alert(data.faktur);
                        
                         if(data>0){
                            alert("Customer ini memiliki Sales Order, Gunakan?");
                            // Temptbl.ajax.url(baseurl+"getdatapo/"+enkrip+"/"+id).load();

                            
                            var Tabelso = $(".table-po").DataTable({
                                "ajax":{
                                    "url":baseurl+"getdatapo/"+enkrip+"/"+id,
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
                            // $("#modal-id").modal('show');
                             // $("#modal-panel .modal-body").html("oke");
                         }
                     });
                   /* $( "#modal-panel" ).on('shown.bs.modal', function(){
                                alert("I want this to appear after the modal has opened!");
                            });*/
                    $("#modal-panel").on("hidden.bs.modal", function(){
                        $(this).data("modal", null);
                        $(this).removeData('bs.modal');
                        $(".table-po").DataTable().destroy();
                    });
                

            }
           /* function cek_order(id){
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
                   
                   /* $("#modal-panel").on("hidden.bs.modal", function(){
                        $(this).data("modal", null);
                        $(this).removeData('bs.modal');
                        $(".table-so").DataTable().destroy();
                    });
                   


            }*/