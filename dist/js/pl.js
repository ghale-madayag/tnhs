$(document).ready(function(){
    $("form#form-pl").on('submit', function(e){
        var formData = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: "data/pl-handler.php",
            data: formData,
            cache: false,
            async: false,
            processData: false,
            contentType: false,
            success: function(data){
                if (data==1) {
                    refresh('pl-all');
                    $("input[type=text],input[type=number]").val("");
                    toastSuccess("Successfully Registered", "You added new data");
                    $("#addEvent").modal('hide');
                }
            }
        })
        e.preventDefault();
    })

    $("form#form-pl-edit").on('submit', function(e){
        var formData = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: "data/pl-handler.php",
            data: formData,
            cache: false,
            async: false,
            processData: false,
            contentType: false,
            success: function(data){
                if (data==1) {
                    refresh('pl-all');
                    toastSuccess("Successfully Updated", "You update the data");
                    $("#editEvent").modal('hide');
                }
            }
        })
        e.preventDefault();
    })

    $("#edit").on('click', function(){
        var len = $("input[name='selectVal']:checked").length;

        if(len==0){
            alert('Please select data');
        }else if(len>1){
            alert('Please select only one data');
        }else{
            $.each($("input[name='selectVal']:checked"), function(){ 
                var formData = $(this).val();
                $.ajax({
                    type: "POST",
                    url:"data/pl-handler.php",
                    data: "get_pl="+formData,
                    cache:false,
                    success: function(data){
                        var json = $.parseJSON(data);
                        $(json).each(function(i,val){
                            $("#plid").val(formData);
                            $("#titleEdit").val(val.title);
                            $("#timeEdit").val(val.time);
                            $("#schoolEdit").val(val.school_id).change();
                            $("#listEdit").val(val.orderlist);
                        });
                    }
                }) 
                $("#editEvent").modal('show');
            });
        }
    });

    $("#del").on('click', function(){
        var len = $("input[name='selectVal']:checked").length;

        if(len==0){
            alert('Please select data');
        }else{
           var del = confirm("Are you sure you want to delete the data?");

           if(del==true){
                $.each($("input[name='selectVal']:checked"), function(){
                    var formData = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "data/pl-handler.php",
                        data: "del="+formData,
                        cache: false,
                        success: function(data){
                            toastSuccess("Successfully Deleted", "The data has been deleted");
                            refresh("pl-all");
                        }
                    })
                });
           }
        }
    })
})

function getAllPL() {
    
    var table = $('#pl-all').DataTable( {
        "dom": '<"toolbar">Bfrtip',
        "lengthChange": false,
		"ordering": false,
		"scrollX": true,
        "buttons": [
            {
                extend: 'excel',
                messageTop: 'The information in this table is copyright to Bahaghari.'
            },
        ],
        "language": {
            "emptyTable":     "No client available"
        },
        "ajax": {
            "url": "data/pl-handler.php",
            "dataSrc": ""
        },
         "columns": [
            { "data": "id" },
            { "data": "school_id" },
			{ "data": "privatelessonday" },
			{ "data": "privatelessontime" },
            { "data": "price" },
            { "data": "orderlist" },
            { "data": "created" },
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

    
    // $('input[type = search]').on( 'keyup', function () {
    //     table.column(2).search('^'+this.value, true, false).draw();
    //  } ); 

    /*------------- custom toolbar ------------*/
     $("div.toolbar").html('<div class="mailbox-controls">'+
         '<button type="button" class="btn btn-default btn-sm checkbox-toggle" title="Select All"><i class="fa fa-square-o"></i> Select All</button> '+
         '<div class="btn-group">'+
            '<button type="button" class="btn btn-default btn-sm" id="del" title="Delete"><i class="fa fa-trash"></i> Delete</button>'+
            '<button type="button" class="btn btn-default btn-sm" id="edit" title="Edit"><i class="fa fa-edit"></i> Edit</button>'+
			'<button type="button" class="btn btn-default btn-sm" title="Add" data-toggle="modal" data-target="#addEvent"><i class="fa fa-plus"></i> Add User</button>'+
            '</div>'+
        '</div>');

     $("div.toolbar").css('float','left');
     $(".buttons-excel").css("display","none");

//     $("#pl-all tbody").on('click', 'tr td:not(:first-child)', function() {
//         var data = table.row(this).data();
//         var encryptedRec = CryptoJS.AES.encrypt(data.recipient_id, "My Secret Passphrase");
//         var encryptedAES = CryptoJS.AES.encrypt(data.client_id, "My Secret Passphrase");
//         window.location.replace('client-edit.php?client='+encryptedAES+'&recipient='+encryptedRec);
//    })

   
}