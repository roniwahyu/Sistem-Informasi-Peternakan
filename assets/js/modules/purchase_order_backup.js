$(function(){
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
                $("body").on("click",".delete_temp",function(e){
                    e.preventDefault();
                    var del_data={id:$(this).attr("id"),ajax:1}
                    if(confirm("Anda Yakin Ingin Menghapus Item Ini?")){
                    $(this).ready(function(){
                            
                                $.ajax({
                                    url: "'.base_url('purchase_order/delete_detail').'",
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
                });
                // gettotal();
                $("#modal-notif").on("hidden.bs.modal", function(){
                    $(this).data("modal", null);
                    // window.location.reload("'.base_url('purchase_order').'"); 
                    window.location="'.base_url('purchase_order').'";
                });
	 				$("#id_supplier").change(function(){
                            var that = this,
                            v = $(this).val();        
                            get_barang(v);
                    });  
                    $("#Kode").change(function(){
                            var that = this,
                            v = $(this).val();
                            get_satuan(v); 
                    });
                    

	function get_satuan(id){
                $("select#Satuan option").remove();
                 $.getJSON("'.base_url('purchase_order/dropdown_satuan/').'/"+id, function (data) {
                         $.each(data, function (index, item) {
                             $("#Satuan").append(
                                  $("<option></option>").val(index).html(item)
                              );
                         });
                     });
            }
            function get_barang(id){
                $("select#Kode option").remove();
                $.getJSON("'.base_url('purchase_order/get_drop_barang/').'/"+id, function (data) {
                         $.each(data, function (index, item) {
                             $("#Kode").append(
                                  $("<option></option>").val(index).html(item)
                              );
                         });
                     });
            }
            function gettotal(){
                var po=$("#faktur_po").val();
                $.get("'.base_url('purchase_order/get_po_detail_total/').'/"+po, 
                    function(datan, status){
                        if(datan>0){
                            $("#totalbayar").val(datan);
                        }else{
                             $("#totalbayar").val(0);
                        }
                    }
                );
            };
            
            function reset_barang(){
                var supplier=$("#id_supplier").val();
                // alert(supplier);
                get_barang(supplier);
            }
})