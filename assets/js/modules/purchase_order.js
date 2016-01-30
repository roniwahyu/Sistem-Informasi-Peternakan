$(document).ready(function(){
            
                $("#id_supplier").change(function(){
                    var that = this,
                    v = $(this).val();
                    get_barang(v);
                });  
                $("#Kode").change(function(){
                    var that = this,
                    v = $(this).val();
                    var urls=brgsatuurl+"getsatuan/"+v+"/";
                    $("#addsatuan").attr("href",urls);
                    get_satuan(v); 
                });
                var po = $("#faktur_po").val();
                var TempTbl=$(".tabletemp").DataTable({

                    "ajax":{
                        "url":baseurl+"get_po_detail/"+enkrip+"/"+po,
                        "dataType": "json"
                    },
                    "sServerMethod": "POST",
                    "bServerSide": true,
                    "bAutoWidth": true,
                    // "lengthChange": true,
                    "SortClasses": true,
                    "bscrollCollapse": true,  
                    "paging":   false,
                    "deferRender": true,
                    "bFilter":false,
                     "ordering": false,  
                     
                });
                $("body").on("click",".generate_po",function(e){
                    e.preventDefault();
                    new_faktur();
                });
                $("body").on("click",".refresh_barang",function(e){
                    e.preventDefault();
                    reset_barang();
                });  
              
                $("body").on("click",".btn-add",function(e){
                    e.preventDefault();
                    // alert(isedit);
                    var faktur = $("#faktur_po").val();
                    var kode = $("#Kode").val();
                    var qty = $("#Qty").val();
                    var satuan = $("#Satuan").val();
                    
                    var datax={id_barang:kode,jumlah:qty,id_satuan:satuan,faktur_po:$("#faktur_po").val(),ajax:1};
                    $(this).ready(function(){
                        $.ajax({
                            url:baseurl+"submit_detail",
                            data:datax,
                            type:"POST",
                            success:function(msg){
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
                                TempTbl.clear(0).draw();
                                gettotal();

                            } });
                        });
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
                                         TempTbl.clear(0).draw();    
                                         gettotal();
                                    }
                                });
                            });
                        }
                    console.clear();
                });

                    gettotal();
                $("#modal-notif").on("hidden.bs.modal", function(){
                    $(this).data("modal", null);
                    window.location=baseurl;
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
                $("body").on("click",".gen_kdsp",function(e){
                    e.preventDefault();gen_kdsp(enkrip);
                });
                $("#modal-form").on("shown.bs.modal", function (e) {
                    gen_kdsp(enkrip);
                }); 
                $("#modal-barang").on("shown.bs.modal", function (e) {
                    var idsp=$("#id_supplier").val();
                    $.get(spurl+"get/"+idsp+"/"+enkrip, function(kdsp, status){
                                var sp = JSON.parse(kdsp);
                                // alert(sp.Kode);
                                $("form#form_barang #id_supplier" ).find( "option[value="+sp.Kode+"]" ).prop( {selected: true,disabled:false} ); 
                            });

                           
                }); 
            
                $("body").on("change","#form_barang #id_golongan",function(e){
                    e.preventDefault();
                    var idgol=$("#form_barang #id_golongan").val();
                    $.get(jnsbrgurl+"get_new_jenis/"+enkrip+"/"+idgol+"/", function(kd, status){
                        $("#form_barang #Kode").prop("value",kd);
                    });    
                });
        

                
    
                
            }); //end of document ready
             function edit_po(po,datas){
                    $.get(baseurl+"get_po_detail_total/"+enkrip+"/"+po, 
                        function(datan, status){
                            if(datan>0){
                                $("#totalbayarx").val(accounting.formatMoney(datan,"Rp ",2,".",","));
                                $("#totalbayar").val(datan);
                            }else{
                                 $("#totalbayar").val(0);
                                 $("#totalbayarx").val(0);
                            }
                        }
                    );
                    
                    // var dt= JSON.parse(datas);
                    // alert(dt);
                    $( "#id_supplier" ).find( "option[value='"+dt.id_supplier+"']" ).prop( "selected", true ); 
                    // $("#id_supplier").attr("readonly","true");

                    $("#id_supplier option:not(:selected)").attr("disabled",true);
                    $( "#status" ).find( "option[value='"+dt.status+"']" ).prop( "selected", true ); 
                    $( "#id_bayar" ).find( "option[value='"+dt.id_bayar+"']" ).prop( "selected", true ); 


            }
                function gen_kdsp(enkrip){
                     $.get(pturl+"get_sp_id/"+enkrip, function(kdsp, status){
                                $("#add_supplier_form #Kode").prop("value",kdsp);
                            });
                }
                function gen_kdbarang(enkrip){
                     $.get(pturl+"get_kdbarang/"+enkrip, function(kdbarang, status){
                                $("#form_barang #Kode").prop("value",kdbarang);
                            });
                }
                function generate_kdbarang(){
                    var idsp=$("#form_barang #id_supplier").val();
                }
            function save_supplier(enkrip){
                var data_sp = $("form#add_supplier_form").serializeArray();
                data_sp.push({name:"ajax",value:1});
                $(this).ready(function(){
                    $.ajax({
                        url:spurl+"submit/"+enkrip,
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
            }
            function save_barang(enkrip){
                var data_sp = $("form#form_barang").serializeArray();
                data_sp.push({name:"ajax",value:1});
                $(this).ready(function(){
                    $.ajax({
                        url:brgurl+"submit/"+enkrip,
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
            }
            function gettotal(){
                var po=$("#faktur_po").val();
                $.get(baseurl+"get_po_detail_total/"+enkrip+"/"+po, 
                    function(datan, status){
                        if(datan>0){
                            $("#totalbayar").val(datan);
                            $("#totalbayarx").val(accounting.formatMoney(datan,"Rp ",2));
                        }else{
                             $("#totalbayar").val(0);
                             $("#totalbayarx").val(0);
                        }
                    }
                );
                console.clear();
            };
            
            function reset_barang(){
                var supplier=$("#id_supplier").val();
                // alert(supplier);
                get_barang(supplier);
            }
            function new_faktur(){
                 $.get(baseurl+"get_new_po/", function(newpo, status){
                    $("#faktur_po").prop("value",newpo);
                    var newfaktur=newpo;
                    // alert(newfaktur);
                });
            };
            function get_satuan(id){
                $("select#Satuan option").remove();
                 $.getJSON(baseurl+"dropdown_satuan/"+id, function (data) {
                         $.each(data, function (index, item) {
                             $("#Satuan").append(
                                  $("<option></option>").val(index).html(item)
                              );
                         });
                     });
            }
            function get_barang(id){
                $("select#Kode option").remove();
                $.getJSON(baseurl+"get_drop_barang/"+enkrip+"/"+id, function (data) {
                         $.each(data, function (index, item) {
                             $("#Kode").append(
                                  $("<option></option>").val(index).html(item)
                              );
                         });
                     });
            }