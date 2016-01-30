$(document).ready(function(){
         var po=$("#faktur_po").val();
            function edit_po(po){
               
                    $.get(baseurl+"get_po_detail_total/"+po, 
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
                    
             
                    $( "#id_supplier" ).find( "option[value='.$data['id_supplier'].']" ).prop( "selected", true ); 
                    // $("#id_supplier").attr("readonly","true");

                    $("#id_supplier option:not(:selected)").attr("disabled",true);
                    $( "#status" ).find( "option[value='.$data['status'].']" ).prop( "selected", true ); 
                    $( "#id_bayar" ).find( "option[value='.$data['id_bayar'].']" ).prop( "selected", true ); 


            }
                
                    //  TempTbl.ajax.url("'.base_url('purchase_order_ajax/get_po_detail/').'/"+po).load();

                    var TempTbl=$(".tabletemp").DataTable({

                        "ajax":{
                            "url":"'.base_url('purchase_order/get_po_detail/'.$po['faktur_po'].'/'.$this->enkrip().'/').'",
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
                            url:"'.base_url('purchase_order/submit_detail').'",
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