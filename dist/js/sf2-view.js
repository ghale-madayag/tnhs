$(document).ready(function(){
    getAllSf2();
    //$('#export').click(function(){ $('.buttons-excel').click(); });

    $('#export').click(function(){ 
        var plaintext = decrypt('sec');
        var mon = decrypt('month');

        var encryptedAES = CryptoJS.AES.encrypt(plaintext, "My Secret Passphrase");
        var encryptedAESMon = CryptoJS.AES.encrypt(mon, "My Secret Passphrase");
        window.open("sf2-print.php?sec="+encryptedAES+"&month="+encryptedAESMon,"_blank");
    });
})


function getAllSf2() {
    var plaintext = decrypt('sec');
    var mon = decrypt('month');
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
            "dataSrc": "",
            "type": "POST",
            "dataSrc": "",
            "data" : 
                {"view-data": plaintext,
                "mon": mon,
            }

        },
         "columns": [
            { "data": "fullname" },
            { "data" : "sf2_w1m"},
            { "data" : "sf2_w1t"},
            { "data" : "sf2_w1w"},
            { "data" : "sf2_w1th"},
            { "data" : "sf2_w1f"},
            { "data" : "sf2_w2m"},
            { "data" : "sf2_w2t"},
            { "data" : "sf2_w2w"},
            { "data" : "sf2_w2th"},
            { "data" : "sf2_w2f"},
            { "data" : "sf2_w3m"},
            { "data" : "sf2_w3t"},
            { "data" : "sf2_w3w"},
            { "data" : "sf2_w3th"},
            { "data" : "sf2_w3f"},
            { "data" : "sf2_w4m"},
            { "data" : "sf2_w4t"},
            { "data" : "sf2_w4w"},
            { "data" : "sf2_w4th"},
            { "data" : "sf2_w4f"},
            { "data" : "sf2_w5m"},
            { "data" : "sf2_w5t"},
            { "data" : "sf2_w5w"},
            { "data" : "sf2_w5th"},
            { "data" : "sf2_w5f"},
            { "data" : "sf2_remarks"},
		],
        'order': [1, 'asc'],
        "fnInitComplete": function(oSettings, json) {
            // Bold the grade for all 'A' grade browsers
            //data = table.$('input').serialize();
        },
    } );

    /*------------- custom toolbar ------------*/
     $("div.toolbar").html('<div class="mailbox-controls">'+
         '<div class="btn-group">'+
            '<button type="button" class="btn btn-default btn-sm" id="export" title="Export"><i class="fa fa-print"></i> Print</button>'+
            '<button type="button" class="btn btn-primary btn-sm" id="save" title="Save"><i class="fa fa-save"></i> Save</button>'+
            '</div>'+
        '</div>');

     $("div.toolbar").css('float','left');
     $(".buttons-excel").css("display","none");

     $('#save').click( function() {
        var data = table.$("input").serialize();
        saveRow(data);
    });
}

function saveRow(result){
    $.ajax({
        type: "POST",
        url: "data/sf2-handler.php",
        data: result,
        cache: false,
        success: function(data) {
            if (data==1) {
                refresh('sf2-all-view');
                //$("input[typ").val("");
                toastSuccess("Successfully Updated", "The data has been updated");
            }
        }
    })
}