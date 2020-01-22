$(document).ready(function(){
	//var usrprint = decrypt('patient');
    var path = window.location.pathname;
    var page = path.split("/").pop();

	$.ajax({
		type: "POST",
		url: "data/sf2-handler.php",
		data: "print=true",
		cache: false,
		success: function(data){
            var result = $(".sf-print tr:last");
            var json = $.parseJSON(data);
            $(json).each(function(i,val){
                result.after('<tr>'+
                    '<td>'+val.sf_no+'</td>'+
                    '<td style="text-align:left;">'+val.sf2_fullname+'</td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td></td>'+
                '</tr>')
            })

            if (page=="sf2-print.php") {
                window.print();
             }
		}

    });
})