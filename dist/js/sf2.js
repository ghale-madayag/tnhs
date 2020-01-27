$(document).ready(function(){
    
    //$('#export').click(function(){ $('.buttons-excel').click(); });
    $('#export').click(function(){ 
        window.open("sf2-print.php","_blank");
    });
})

function getAllSf2() {
    
    var table = $('#sf2-all').DataTable( {
        "dom": '<"toolbar">Bfrtip',
        "lengthChange": false,
		"ordering": false,
        "scrollX": true,
        "buttons": [
            {
                extend: 'excel',
                messageTop: 'The information in this table is copyright to TNHS.'
            },
        ],
        "language": {
            "emptyTable":     "No data available"
        },
        "ajax": {
            "url": "data/sf2-handler.php",
            "dataSrc": ""
        },
         "columns": [
            { "data": "sf2_lrn" },
            { "data": "sf2_fullname" },
            { "data": "sf2_indate"},
		],
        'order': [1, 'asc']
    } );

    /*------------- custom toolbar ------------*/
     $("div.toolbar").html('<div class="mailbox-controls">'+
         '<div class="btn-group">'+
            '<button type="button" class="btn btn-default btn-sm" id="export" title="Export"><i class="fa fa-print"></i> Print</button>'+
            '</div>'+
        '</div>');

     $("div.toolbar").css('float','left');
     $(".buttons-excel").css("display","none");

   
}