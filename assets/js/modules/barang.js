$(document).ready(function(){


        
        oTable=$('#datatables').dataTable({
            "ajax":{
                "url":baseurl+"getdatatables",
                "dataType": "json"
            },
            "sServerMethod": "POST",
            "bServerSide": true,
            "bAutoWidth": false,
            "bDeferRender": true,
            "bSortClasses": false,
            "bScrollCollapse": true,    
            "bStateSave": true,
            "responsive": true,
            "aoColumns": [
                { "sClass": "id","sName": "id","sWidth": "30px", "aTargets": [0] } ,
                { "sClass": "Kode", "sName": "Kode", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Cabang", "sName": "Cabang", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Barcode", "sName": "Barcode", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Nama", "sName": "Nama", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Keterangan", "sName": "Keterangan", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Golongan", "sName": "Golongan", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "NmGolongan", "sName": "NmGolongan", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Markup", "sName": "Markup", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Merk", "sName": "Merk", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Ukuran", "sName": "Ukuran", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Kualitas", "sName": "Kualitas", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Motif", "sName": "Motif", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Warna", "sName": "Warna", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Kemasan", "sName": "Kemasan", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Isi2", "sName": "Isi2", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Isi3", "sName": "Isi3", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Satuan1", "sName": "Satuan1", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Satuan2", "sName": "Satuan2", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Satuan3", "sName": "Satuan3", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "HPL1", "sName": "HPL1", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "HPL2", "sName": "HPL2", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "HPL3", "sName": "HPL3", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "KTBeli", "sName": "KTBeli", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Beli1", "sName": "Beli1", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Beli2", "sName": "Beli2", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Beli3", "sName": "Beli3", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "KTJual", "sName": "KTJual", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Jual1", "sName": "Jual1", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Jual2", "sName": "Jual2", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Jual3", "sName": "Jual3", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "HB1", "sName": "HB1", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "HB2", "sName": "HB2", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "HB3", "sName": "HB3", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "HJ1R", "sName": "HJ1R", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "HJ2R", "sName": "HJ2R", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "HJ3R", "sName": "HJ3R", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "HJ1U", "sName": "HJ1U", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "HJ2U", "sName": "HJ2U", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "HJ3U", "sName": "HJ3U", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "HJ2P", "sName": "HJ2P", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "HJ3P", "sName": "HJ3P", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "HN1", "sName": "HN1", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "HN2", "sName": "HN2", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "HN3", "sName": "HN3", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Max", "sName": "Max", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "SatuanMax", "sName": "SatuanMax", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Min", "sName": "Min", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "SatuanMin", "sName": "SatuanMin", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "HP", "sName": "HP", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "StKon", "sName": "StKon", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "OldHN1", "sName": "OldHN1", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "OldHN2", "sName": "OldHN2", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "OldHN3", "sName": "OldHN3", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "OldHb1", "sName": "OldHb1", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "OldHB2", "sName": "OldHB2", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "OldHb3", "sName": "OldHb3", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "OldHJ1U", "sName": "OldHJ1U", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "OldHJ2U", "sName": "OldHJ2U", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "OldHJ3U", "sName": "OldHJ3U", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "OldHJ1R", "sName": "OldHJ1R", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "OldHJ2R", "sName": "OldHJ2R", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "OldHJ3R", "sName": "OldHJ3R", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Supplier1", "sName": "Supplier1", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "NmSupplier1", "sName": "NmSupplier1", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Supplier2", "sName": "Supplier2", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "NmSupplier2", "sName": "NmSupplier2", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Supplier3", "sName": "Supplier3", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "NmSupplier3", "sName": "NmSupplier3", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Supplier4", "sName": "Supplier4", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "NmSupplier4", "sName": "NmSupplier4", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "User", "sName": "User", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Time", "sName": "Time", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "center", "bSortable": false, "bSearchable": false, "sWidth": "100px","mData": 0,
                    "mDataProp": function(data, type, full) {
                    return "<div class='btn-group'><a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='"+data[0]+"'><i class='glyphicon glyphicon-edit'></i></a><button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='"+data[0]+"'><i class='glyphicon glyphicon-remove'></i></button>";
                }}
               
            ],
        });
      
});   


  