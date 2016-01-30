// $("document").ready(function(){
	var jr=$("#no_jurnal").val();
    gettotal_detail(jr);
	// });
                var tbl_bukti=$(".table-bukti").DataTable({
                        "ajax":{
                                    "url":buktiurl+"load_bukti/BM",
                                    "dataType": "json"
                                },
                            "sServerMethod": "POST",
                            "bServerSide": true,
                            "bAutoWidth": true,
                            "SortClasses": true,
                            "bscrollCollapse": true,  
                           
                        });
                var tbl_detail=$(".table-detail").DataTable({
                        "ajax":{
                                    "url":baseurl+"getdetail/"+jr,
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
            

            $("#modal-bukti").on("hidden.bs.modal",function(){
                // $("#filter_buk   ti").val(0);
                $(".table-bukti").DataTable().destroy();
            });
            $("body").on("click",".usethis",function(e){
                var $this=$(this);
                var id=$this.attr("id");
                var bukti=$this.data("bukti");
                // var akun=$this.data("akun");
                $("#no_bukti").val(bukti);
            });
            $("body").on("click",".bukti",function(e){
                e.preventDefault();
                var id=$("select#filter_bukti").val();

                $.post(buktiurl+"get/"+id,function(data,status){
                    var dt=JSON.parse(data);
                    var bukti=dt.kode_bukti;
                    // $.post(buktiurl+"load_bukti/"+bukti,function(d,status){
                    urls=buktiurl+"load_bukti/"+bukti;
                        // var dta=JSON.parse(d);
                        // alert(dta);
                         tbl_bukti.ajax.url(urls).load();
                    // });
                });
                // alert(id);
            });
                $("#modal-notif").on("hidden.bs.modal", function(){
                    $(this).data("modal", null);
                    
                    window.location=baseurl;
                    
                });
                        $("body").on("click","#save_jurnal",function(e){
                            e.preventDefault();
                        });
                        $("body").on("click",".add_jurnal",function(e){
                            e.preventDefault();
                            // alert(isedit);
                            var bukti = $("#akun_detail").val();
                            var no = $("#no_perkiraan").val();
                            var desc = $("#deskripsi").val();
                            var nojr = $("#no_jurnal").val();
                            var nom = $("#nilai").val();
                            var tipe=$("input[name=tipe_detail]:checked", "form#addform").val();
                           
                          
                            // alert(tipe);
                            
                            var datax={nilai:nom,akun_detail:no,ket_detail:desc,no_jurnal:nojr,tipe_detail:tipe,ajax:1};

                            $(this).ready(function(){
                                $.ajax({
                                    url:baseurl+"submit_detail/",
                                    data:datax,
                                    type:"POST",
                                    success:function(msg){
                                        //alert(msg);
                                        $(".add_panel").find("input[type=text]").val("");
                                      
                                        tbl_detail.clear().draw();
                                        //total_giro(bukti);
                                        gettotal_detail(nojr);

                                    } });
                                });
                            // console.clear();
                        });
            function gettotal_detail(no){
                $.post(baseurl+"getot_detail/"+no,function(d,status){
                    
                        var dta=JSON.parse(d);
                        $("#total_debet").val(dta.totdebet);
                        $("#total_kredit").val(dta.totkredit);
                        $("#total_kreditx").val(accounting.formatMoney(dta.totkredit,"Rp. ",2,".",","));
                        $("#total_debetx").val(accounting.formatMoney(dta.totdebet,"Rp. ",2,".",","));
                        // alert(dta.totdebet);
                         // tbl_bukti.ajax.url(urls).load();
                });
            }