$(document).ready(function(){
              
           
               

                
            
            });
            function get_satuan(id){
                $("select#Satuan option").remove();
                 $.getJSON(baseurl+"dropdown_satuan/').'/"+id, function (data) {
                         $.each(data, function (index, item) {
                             $("#Satuan").append(
                                  $("<option></option>").val(index).html(item)
                              );
                         });
                     });
            }
            function get_barang(id){
                $("select#Kode option").remove();
                $.getJSON(baseurl+"get_drop_barang/').'/"+id, function (data) {
                         $.each(data, function (index, item) {
                             $("#Kode").append(
                                  $("<option></option>").val(index).html(item)
                              );
                         });
                     });
            }
            function gettotal(){
                var po=$("#faktur_po").val();
                $.get(baseurl+"get_po_detail_total/').'/"+enkrip+"/"+po, 
                    function(datan, status){
                        if(datan>0){
                            $("#totalbayar").val(datan);
                            $("#totalbayarx").val(accounting.formatMoney(datan,"Rp ",2,".",","));
                        }else{
                             $("#totalbayar").val(0);
                             $("#totalbayarx").val(0);
                        }
                    }
                );
            };
            
            function reset_barang(){
                var supplier=$("#id_supplier").val();
                // alert(supplier);
                get_barang(supplier);
            }