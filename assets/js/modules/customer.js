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
                { "sClass": "Nama", "sName": "Nama", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Alamat", "sName": "Alamat", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Wilayah", "sName": "Wilayah", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Area", "sName": "Area", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Contact", "sName": "Contact", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Telepon", "sName": "Telepon", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Fax", "sName": "Fax", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Kota", "sName": "Kota", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "JthTempo", "sName": "JthTempo", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Diskon", "sName": "Diskon", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Plafond", "sName": "Plafond", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Subsidi", "sName": "Subsidi", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "NPWP", "sName": "NPWP", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Status", "sName": "Status", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Hutang", "sName": "Hutang", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Bayar", "sName": "Bayar", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Sisa", "sName": "Sisa", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Bank", "sName": "Bank", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Rekening", "sName": "Rekening", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "AnRekening", "sName": "AnRekening", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "User", "sName": "User", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Time", "sName": "Time", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Golongan", "sName": "Golongan", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "NoAcc", "sName": "NoAcc", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "LastPrint", "sName": "LastPrint", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "StAktif", "sName": "StAktif", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "center", "bSortable": false, "bSearchable": false, "sWidth": "100px","mData": 0,
                    "mDataProp": function(data, type, full) {
                    return "<div class='btn-group'><a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='"+data[0]+"'><i class='glyphicon glyphicon-edit'></i></a><button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='"+data[0]+"'><i class='glyphicon glyphicon-remove'></i></button>";
                }}
               
            ],
        });
      
});   


  