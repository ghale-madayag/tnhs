$(document).ready(function() { 
    getAll();
    getSy();
    getSection();
    
    $("form#form-submit").on('submit', function(e){
        var formData = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: "data/sy-handler.php",
            data: formData,
            cache: false,
            async: false,
            processData: false,
            contentType: false,
            success: function(data){
                console.log(data)
                if (data==1) {
                    refresh('form-table');
                    $("input[type=text],input[type=number],textarea").val("");
                    toastSuccess("Successfully Added", "You added new data");
                    $("#addEvent").modal('hide');
                }
            }
        })
        e.preventDefault();
    })
});

function getAll() {
    var table = $('#form-table').DataTable( {
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
            "url": "data/sy-handler.php",
            "type": "POST",
            "dataSrc": "",
            "data" : 
                {
                    "view": "true",
                }
        },
         "columns": [
            { "data" : "id"},
            { "data" : "year"},
            { "data" : "section"},
            { "data" : "indate"},
        ],
        'drawCallback': function(){
			$('input[type="checkbox"]').iCheck({
			   checkboxClass: 'icheckbox_flat-blue'
			});
		 },
         'columnDefs': [{
         'targets': 0,
         'searchable':false,
         'orderable':false,
         'className': 'dt-body-center',
         'render': function (data, type, full, meta){
             return '<input type="checkbox" name="selectVal" id="selectVal" value="'+full.sf2sec_id+'" data-rec="'+full.month+'">';
        }
        }],
        'order': [1, 'asc'],
        "fnInitComplete": function(oSettings, json) {
            // Bold the grade for all 'A' grade browsers
            //data = table.$('input').serialize();
        },
    } );

    /*------------- custom toolbar ------------*/
     $("div.toolbar").html('<div class="mailbox-controls">'+
         '<div class="btn-group">'+
            '<button type="button" class="btn btn-default btn-sm" id="del" title="Delete"><i class="fa fa-trash"></i> Delete</button>'+
            '<button type="button" class="btn btn-default btn-sm" id="edit" title="Edit"><i class="fa fa-edit"></i> Edit</button>'+
            '<button type="button" class="btn btn-default btn-sm" title="Add" data-toggle="modal" data-target="#addEvent"><i class="fa fa-plus"></i> Add</button>'+
            '</div>'+
        '</div>');

     $("div.toolbar").css('float','left');
     $(".buttons-excel").css("display","none");

}