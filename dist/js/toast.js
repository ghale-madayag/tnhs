function toast(txt) {
	$.toast({
		stack: false,
	    heading: '<strong>Thank you!</strong>',
	    text: txt,
	    showHideTransition: 'slide',
	    icon: 'success',
	    bgColor: '#00A65A',
	    hideAfter: 10000,
	})
}

function toastErr(head,txt) {
	$.toast({
		stack: true,
	    heading: head,
	    text: txt,
	    showHideTransition: 'slide',
	    icon: 'error',
	    hideAfter: 10000,
	    loaderBg: '#FEC532',
	    position: 'bottom-right'
	})
}

function toastSuccess(head,txt) {
	$.toast({
		stack: true,
	    heading: head,
	    text: txt,
	    icon: 'success',
	    showHideTransition: 'slide',
	    bgColor: '#0B7542',
	    hideAfter: 10000,
	    loaderBg: '#f1f1f1',
	    position: 'bottom-right'
	})
}

function refresh(tbl) {
	$('#' + tbl).DataTable().ajax.reload(null, false);
	$('#' + tbl).on('draw.dt', function () {
	})
}

function decrypt(e) {
	var para = getUrlParameter(e);
	var plaintext;
	var decryptedBytes = CryptoJS.AES.decrypt(para, "My Secret Passphrase");
	plaintext = decryptedBytes.toString(CryptoJS.enc.Utf8);
	return plaintext;
}



var getUrlParameter = function getUrlParameter(sParam) {
	var sPageURL = decodeURIComponent(window.location.search.substring(1)),
		sURLVariables = sPageURL.split('&'),
		sParameterName,
		i;

	for (i = 0; i < sURLVariables.length; i++) {
		sParameterName = sURLVariables[i].split('=');

		if (sParameterName[0] === sParam) {
			return sParameterName[1] === undefined ? true : sParameterName[1];
		}
	}
};

function getAllSfView(param) {
    var table = $('#sf-all').DataTable( {
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
            "url": "data/sf"+param+"-handler.php",
            "type": "POST",
            "dataSrc": "",
            "data" : 
                {
                    "view": "true",
                }
        },
         "columns": [
            { "data" : "sf2sec_id"},
            { "data" : "month"},
            { "data" : "sy"},
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
            '<button type="button" class="btn btn-default btn-sm" title="Generate" data-toggle="modal" data-target="#addEvent"><i class="fa fa-refresh"></i> Generate Record</button>'+
            '<button type="button" class="btn btn-default btn-sm" id="view" title="View"><i class="fa fa-eye"></i> View</button>'+
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


function getSy() {

	$('#sy').select2({
		width: 'resolve',
		placeholder: "Select Year..",
		allowHtml: true,
		allowClear: false,
		tags: true,
		ajax: {
			url: 'data/sy-search.php',
			dataType: 'json',
			quietMillis: 100,
			processResults: function (data) {
				return {
					results: $.map(data, function (obj) {
						return { id: obj.sy_id, text: obj.sy_name };
					})
				};

			}
		}
	});
}

function getSection() {

	$('#section').select2({
		width: 'resolve',
		placeholder: "Select Section..",
		allowHtml: true,
		allowClear: false,
		tags: true,
		ajax: {
			url: 'data/section-search.php',
			dataType: 'json',
			quietMillis: 100,
			processResults: function (data) {
				return {
					results: $.map(data, function (obj) {
						return { id: obj.sec_id, text: obj.sec_name };
					})
				};

			}
		}
	});
}

function getFullname() {

	$('#fullname').select2({
		width: 'resolve',
		placeholder: "Select Student..",
		allowHtml: true,
		allowClear: true,
		tags: false,
		ajax: {
			url: 'data/getname-search.php',
			dataType: 'json',
			quietMillis: 100,
			processResults: function (data) {
				return {
					results: $.map(data, function (obj) {
						return { id: obj.sf1_lrn, text: obj.sf1_fullname };
					})
				};

			}
		}
	});
}
