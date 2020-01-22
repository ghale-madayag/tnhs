$(document).ready(function(){
    $("form#form-sf1").on('submit', function(e){
        var formData = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: "data/sf1-handler.php",
            data: formData,
            cache: false,
            async: false,
            processData: false,
            contentType: false,
            success: function(data){
                console.log(data)
                if (data==1) {
                    refresh('sf1-all');
                    $("input[type=text],input[type=number],textarea").val("");
                    toastSuccess("Successfully Registered", "You added new data");
                    $("#addEvent").modal('hide');
                }
            }
        })
        e.preventDefault();
    })

    $('#export').click(function(){ $('.buttons-excel').click(); });
})

function getAllSf1() {
    
    var table = $('#sf1-all').DataTable( {
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
            "url": "data/sf1-handler.php",
            "dataSrc": ""
        },
         "columns": [
            { "data": "sf1_lrn" },
            { "data": "sf1_lrn" },
			{ "data": "sf1_fullname" },
			{ "data": "sf1_sex" },
            { "data": "sf1_dob" },
            { "data": "sf1_age" },
            { "data": "sf1_religion" },
            { "data": "sf1_add"},
            { "data": "sf1_fatname"},
            { "data": "sf1_motname"},
            { "data": "sf1_guaname"},
            { "data": "sf1_rel"},
            { "data": "sf1_contact"},
            { "data": "sf1_indate"},
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
             return '<input type="checkbox" name="selectVal" id="selectVal" value="'+data+'" data-rec="'+full.id+'">';
        }
        }],
        'order': [1, 'asc']
    } );

    /*------------- custom toolbar ------------*/
     $("div.toolbar").html('<div class="mailbox-controls">'+
         '<button type="button" class="btn btn-default btn-sm checkbox-toggle" title="Select All"><i class="fa fa-square-o"></i> Select All</button> '+
         '<div class="btn-group">'+
            '<button type="button" class="btn btn-default btn-sm" id="del" title="Delete"><i class="fa fa-trash"></i> Delete</button>'+
            '<button type="button" class="btn btn-default btn-sm" id="edit" title="Edit"><i class="fa fa-edit"></i> Edit</button>'+
			'<button type="button" class="btn btn-default btn-sm" title="Add" data-toggle="modal" data-target="#addEvent"><i class="fa fa-plus"></i> Add</button>'+
            '<button type="button" class="btn btn-default btn-sm" id="export" title="Export"><i class="fa fa-print"></i> Print</button>'+
            '</div>'+
        '</div>');

     $("div.toolbar").css('float','left');
     $(".buttons-excel").css("display","none");

   
}