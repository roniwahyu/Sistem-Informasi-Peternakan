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
                { "sClass": "Faktur","sName": "Faktur","sWidth": "30px", "aTargets": [0] } ,
                { "sClass": "Tgl", "sName": "Tgl", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Kepada", "sName": "Kepada", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Alamat", "sName": "Alamat", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Sopir", "sName": "Sopir", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Mobil", "sName": "Mobil", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Barang", "sName": "Barang", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "User", "sName": "User", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Time", "sName": "Time", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Status", "sName": "Status", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "cNoJrn", "sName": "cNoJrn", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "lVoid", "sName": "lVoid", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "lPosted", "sName": "lPosted", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "center", "bSortable": false, "bSearchable": false, "sWidth": "100px","mData": 0,
                    "mDataProp": function(data, type, full) {
                    return "<div class='btn-group'><a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='"+data[0]+"'><i class='glyphicon glyphicon-edit'></i></a><button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='"+data[0]+"'><i class='glyphicon glyphicon-remove'></i></button>";
                }}
               
            ],
        });
      
});   


  