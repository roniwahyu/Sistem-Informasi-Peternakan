                $('document').ready(function(){
                    total_bank_detail(bukti);
                    total_giro(bukti);
                    console.clear();
                
               
                var Tbl_bank=$(".table_bank_detail").DataTable({
                "ajax":{
                            "url":baseurl+"get_bank_detail/"+bukti,
                            "dataType": "json"
                        },
                        "sServerMethod": "POST",
                        "bServerSide": true,
                        "bAutoWidth": true,
                        "SortClasses": true,
                        "bscrollCollapse": true,  
                        "paging":   false,
                        "deferRender": true,
                        "bFilter":false,
                         "ordering": false,  
                         
                    });
                var Tbl_giro=$(".table_tt_giro").DataTable({
                "ajax":{
                            "url":baseurl+"get_tt_giro/"+bukti,
                            "dataType": "json"
                        },
                        "sServerMethod": "POST",
                        "bServerSide": true,
                        "bAutoWidth": false,
                        "SortClasses": true,
                        "bscrollCollapse": true,  
                        "paging":   false,
                        "deferRender": true,
                        "bFilter":false,
                         "ordering": false,  

                         
                    });
                    $("#trx_masuk").click(function() {
                        
                        if($("#trx_masuk").is(":checked")) { 
                            // alert("masuk");  
                            $("#id_supplier").hide(100);
                            $("#id_supplier").val("");
                            $(".supplier").hide(100);
                            $("#id_customer").show(100);
                            $(".customer").show(100);
                            $("#bukti_bank").val(bm);
                            $(".panel_bank").addClass("panel-primary");
                            $(".panel_bank").removeClass("panel-danger");
                        }
                    }); 
                    $("#trx_keluar").click(function() {
                       
                        if($("#trx_keluar").is(":checked")) { 
                            // alert("keluar"); 
                            $("#id_supplier").show(100);
                            $("#id_customer").hide(100);
                            $("#id_customer").val("");
                            $(".supplier").show(100);
                            $(".customer").hide(100);
                            $("#bukti_bank").val(bk);
                             $(".panel_bank").removeClass("panel-primary");
                             $(".panel_bank").addClass("panel-danger");
                        }
                    });

                    $("body").on("click",".use_rek_bank",function(e){
                        e.preventDefault(); 
                        var $this=$(this);
                        var id=$this.data("id");
                        var rek=$this.data("rek-bank");
                        var kode=$this.data("kode-bank");
                        var ket=$this.data("keterangan");
                        if(id){
                            $("#akun_bank").val(rek);
                            $("#id_bank").val(id);
                            $("#banks").val(kode+" - "+ket);

                        }
                        console.clear();
                        
                    });

                    $("body").on("click",".load_bank",function(e){
                        e.preventDefault();
                         $(".table_rek_bank").DataTable({
                            "ajax":{
                                        "url":banksurl+"getbanks/",
                                        "dataType": "json"
                                    },
                                    "sServerMethod": "POST",
                                    "bServerSide": true,
                                    "bAutoWidth": true,
                                    "SortClasses": true,
                                    "bscrollCollapse": true,  
                                    "paging": false,
                                    "deferRender": true,
                                    "bFilter":false,
                                     "ordering": false,  
                                     
                                
                                });
                        console.clear();
                    });
                    $("body").on("click",".add_bank",function(e){
                        e.preventDefault();
                        // alert(isedit);
                        var bukti = $("#bukti_bank").val();
                        var faktur = $("#faktur_lawan").val();
                        var akun = $("#akun_lawan").val();
                        var no = $("#no_perkiraan").val();
                        var ket= $("#deskripsi").val();
                        var nom = $("#nilai").val();
                        
                        var datax={faktur_lawan:faktur,nominal_detail:nom,akun_lawan:no,keterangan_detail:ket,bukti_bank:$("#bukti_bank").val(),ajax:1};
                        $(this).ready(function(){
                            $.ajax({
                                url:baseurl+"submit_detail/",
                                data:datax,
                                type:"POST",
                                success:function(msg){
                                    //alert(msg);
                                    // $("#faktur_lawan").prop("value","");
                                    // $("#deskripsi").prop("value","");
                                    // $("#nilai").prop("value","");
                                    // $("#no_perkiraan").prop("value","");
                                    $(".add_panel").find("input[type=text]").val("");
                                    Tbl_bank.clear().draw();
                                    total_bank_detail(bukti);
                                    

                                } });
                                });
                            console.clear();
                        });

                        $("body").on("click",".add_tt_giro",function(e){
                            e.preventDefault();
                            // alert(isedit);
                            // var bukti = $("#bukti_bank").val();
                            var tipe_giro = $("#tipe_tt_giro").val();
                            var tgl_giro = $("#tgl_tt_giro").val();
                            var no = $("#no_tt_giro").val();
                            var nom = $("#nominal").val();
                            
                            var tt_giro={nominal:nom,bukti_bank:bukti,tipe_tt_giro:tipe_giro,tgl_tt_giro:tgl_giro,no_tt_giro:no,ajax:1};
                            $(this).ready(function(){
                                $.ajax({
                                    url:baseurl+"submit_giro/",
                                    data:tt_giro,
                                    type:"POST",
                                    success:function(msg){
                                        //alert(msg);
                                        $(".table_tt_giro").find("input[type=text]").val("");
                                      
                                        Tbl_giro.clear().draw();
                                        total_giro(bukti);
                                        

                                    } });
                                });
                            console.clear();
                        });
                        $("body").on("click",".del_detail",function(e){
                            e.preventDefault();
                            var idnya=$(this).attr("id");
                            // alert(idnya
                            //var bukti = $("#bukti_bank").val();                    
                           
                            $.post( baseurl+"delete_detail/"+idnya,{ id:idnya,ajax:1},function(data,status){
                                if(status="success"){
                                    Tbl_bank.clear().draw(); 
                                    total_bank_detail(bukti);
                                }
                            });
                                
                            console.clear();
                            // totalkas_keluar(bukti);
                        });
                        $("body").on("click",".del_tt_giro",function(e){
                            e.preventDefault();
                            var idnya=$(this).attr("id");
                            // alert(idnya
                            //var bukti = $("#bukti_bank").val();                    
                           
                            $.post( girourl+"delete/"+idnya,{ id:idnya,ajax:1},function(data,status){
                                if(status="success"){
                                    Tbl_giro.clear().draw(); 
                                    total_giro(bukti);
                                }
                            });
                            
                        console.clear();
                        // totalkas_keluar(bukti);
                        });
                  
                    $("#modal-bank").on("hidden.bs.modal",function(){
                        $(".table_rek_bank").DataTable().destroy();
                        

                    });
                    $("#modal-notif").on("hidden.bs.modal", function(){
                        $(this).data("modal", null);
                        if($("#trx_masuk").is(":checked")) { 
                            // var trx=$("#tipe_trx").val();
                            // alert(trx);
                            window.location=baseurl+"masuk/";
                        }else{
                            window.location=baseurl+"keluar/";

                        }
                    });
                  console.clear();
                });
                    
                function total_bank_detail(bukti){
                    // Tbl_out.clear(0).draw(); 
                    $.get(baseurl+"get_total_detail/"+bukti+"/", function(dt, status){
                            d=JSON.parse(dt);
                            if(d.total_nominal>0){
                                $("#total_bank").val(d.total_nominal).trigger("change");
                                $("#total_bankx").val(accounting.formatMoney(d.total_nominal,"Rp. ",2,".",",")).trigger("change");
                            }else{
                                $("#total_bank").val(0);
                                $("#total_bankx").val(0);

                            }
                        });
                    console.clear();
                }   
                function total_giro(bukti){
               
                    $.get(baseurl+"get_total_giro/"+bukti+"/", function(dt, status){
                        d=JSON.parse(dt);
                        if(d.total_tt_giro>0){
                            $("#total_giro").val(d.total_tt_giro).trigger("change");
                            $("#total_girox").val(accounting.formatMoney(d.total_tt_giro,"Rp. ",2,".",",")).trigger("change");
                        }else{
                            $("#total_giro").val(0);
                            $("#total_girox").val(0);

                        }
                    });
                    console.clear();
                }   