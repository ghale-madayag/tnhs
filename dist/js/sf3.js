$(document).ready(function(){
    //getAllSf3(); 
    getAllSfView(3);
    getFullname();
    getSy();

    $("form#form-sf3").on('submit', function(e){
        var formData = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: "data/sf3-handler.php",
            data: formData,
            cache: false,
            async: false,
            processData: false,
            contentType: false,
            success: function(data){
                console.log(data)
                if (data==1) {
                    refresh('sf3-all');
                    $("input[type=text],input[type=number],textarea").val("");
                    $("#fullname").select2("val", "");
                    toastSuccess("Successfully Registered", "You added new data");
                    $("#addEvent").modal('hide');
                }
            }
        })
        e.preventDefault();
    })

    $("#view").on('click', function(){
        var len = $("input[name='selectVal']:checked").length;

        if(len==0){
            alert('Please select data');
        }else if(len>1){
            alert('Please select only one data');
        }else{
            $.each($("input[name='selectVal']:checked"), function(){
                var formData = $(this).val();
                var mon = $(this).data('rec'); 
                var encryptedAES = CryptoJS.AES.encrypt(formData, "My Secret Passphrase");
                var encryptedMon = CryptoJS.AES.encrypt(mon, "My Secret Passphrase");
                window.location.replace('sf3-view.php?sec='+encryptedAES+'&month='+encryptedMon);
            });
        }
    });

    $('#export').click(function(){ 
        var len = $("input[name='selectVal']:checked").length;

        if(len==0){
            alert('Please select data');
        }else if(len>1){
            alert('Please select only one data');
        }else{
            $.each($("input[name='selectVal']:checked"), function(){
                var formData = $(this).val();
                var mon = $(this).data('rec'); 
                var encryptedAES = CryptoJS.AES.encrypt(formData, "My Secret Passphrase");
                var encryptedMon = CryptoJS.AES.encrypt(mon, "My Secret Passphrase");
                window.open('sf3-print.php?sec='+encryptedAES+'&month='+encryptedMon,'_blank');
            });
        }
    });
})

function getAllSf3(){
    var table = $('#sf3-all').DataTable( {
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
            "url": "data/sf3-handler.php",
            "dataSrc": "",

        },
         "columns": [
            { "data" : "id"},
            { "data" : "fullname"},
            { "data" : "title"},
            { "data" : "issued"},
            { "data" : "returned"},
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
            '<button type="button" class="btn btn-default btn-sm" title="Generate" data-toggle="modal" data-target="#addEvent"><i class="fa fa-plus"></i> Add</button>'+
            '<button type="button" class="btn btn-default btn-sm" id="views" title="View"><i class="fa fa-eye"></i> View</button>'+
            '<button type="button" class="btn btn-default btn-sm" id="export" title="Export"><i class="fa fa-print"></i> Print</button>'+
            '</div>'+
        '</div>');

     $("div.toolbar").css('float','left');
     $(".buttons-excel").css("display","none");

     $('#save').click( function() {
        var data = table.$("input").serialize();
        saveRow(data);
    });

    
}


