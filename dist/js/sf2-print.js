$(document).ready(function(){

	$.ajax({
		type: "POST",
		url: "data/sf2-handler.php",
		data: "print_m=true",
		cache: false,
		success: function(data){
            var result = $(".sf-print tr:last");
            var json = $.parseJSON(data);
            var totalM = 0;
            var tdata;

            for (var i = 1; i <=34; i++) {
                tdata += '<td></td>';
            }

            $(json).each(function(i,val){
                result.after('<tr>'+
                    '<td>'+val.sf_no+'</td>'+
                    '<td style="text-align:left;">'+val.sf2_fullname+'</td>'+tdata+
                '</tr>')
                totalM++;
            })

            print_female(totalM);
		}

    });
})

function print_female(totalM){
    var path = window.location.pathname;
    var page = path.split("/").pop();
    $.ajax({
		type: "POST",
		url: "data/sf2-handler.php",
		data: "print_f=true",
        cache: false,
        beforeSend: function(){
            var tdata;

            for (var i = 1; i <=31; i++) {
                tdata += '<td>'+totalM+'</td>';
            }

            var result = $(".sf-print tr:last");
            result.after('<tr>'+
            '<td></td>'+
            '<td style="text-align:center;font-size:11px;"><=== MALE TOTAL PER DAY===></td>'+
            tdata+
            '<td></td>'+
            '<td></td>'+
            '<td></td>'+
        '</tr>')
        },
		success: function(data){
            var result = $(".sf-print tr:last");
            var json = $.parseJSON(data);
            var totalF = 0;
            var combine = 0;

            var tdata;

            for (var i = 1; i <=34; i++) {
                tdata += '<td></td>';
            }
            $(json).each(function(i,val){

                result.after('<tr>'+
                    '<td>'+val.sf_no+'</td>'+
                    '<td style="text-align:left;">'+val.sf2_fullname+'</td>'+
                    tdata+
                '</tr>')

                totalF++;
            })

            combine = totalM+totalF;

            var tdataF,tdTotal;

            for (var i = 1; i <=31; i++) {
                tdataF += '<td>'+totalF+'</td>';
            }

            for (var i = 1; i <=31; i++) {
                tdTotal += '<td>'+combine+'</td>';
            }

            var result = $(".sf-print tr:last");
            result.after('<tr>'+
            '<td></td>'+
            '<td style="text-align:center;font-size:11px;"><=== FEMALE TOTAL PER DAY===></td>'+
            tdataF+
            '<td></td>'+
            '<td></td>'+
            '<td></td>'+
        '</tr>'+
       '<tr>'+
            '<td></td>'+
            '<td style="text-align:center;font-size:11px;">COMBINED TOTAL PER DAY</td>'+
            tdTotal+
            '<td></td>'+
            '<td></td>'+
            '<td></td>'+
        '</tr>')
            
            if (page=="sf2-print.php") {
                window.print();
            }
		}

    });
}