$(document).ready(function(){
    // var plaintext = decrypt('sec');
    // var mon = decrypt('month');
    var result = $(".sf-print tr:last");
    
	$.ajax({
		type: "POST",
		url: "data/sf3-handler.php",
        //data: "print_m=true&sec="+plaintext+"&month="+mon,
        data: "print=true",
		cache: false,
		success: function(data){
            
            var json = $.parseJSON(data);
            var totalM = 0;
            var arr = [];

            $(json).each(function(i,val){
                var value = val.fullname;
                var table = '<tr>';
                
                if (arr.indexOf(value) == -1){
                    table +='<td></td>'+
                    '<td style="text-align:left;">'+val.fullname+'</td>'+val.td;
                    arr.push(value);
                }else{
                   //table += val.td;
                }

                
                table += '</tr>';

                result.after(table)
                totalM++;

            })

            

            //print_female(totalM,plaintext,mon);
		}

    });
})

function print_female(totalM,plaintext,mon){
    var path = window.location.pathname;
    var page = path.split("/").pop();
    $.ajax({
		type: "POST",
		url: "data/sf2-handler.php",
		data: "print_f=true&sec="+plaintext+"&month="+mon,
        cache: false,
        beforeSend: function(){
            var tdata;

            for (var i = 1; i <=25; i++) {
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

            for (var i = 1; i <=25; i++) {
                tdata += '<td></td>';
            }
            $(json).each(function(i,val){

                result.after('<tr>'+
                '<td>'+val.sf_no+'</td>'+
                '<td style="text-align:left;">'+val.fullname+'</td>'+
                '<td style="text-align:left;">'+val.sf2_w1m+'</td>'+
                '<td style="text-align:left;">'+val.sf2_w1t+'</td>'+
                '<td style="text-align:left;">'+val.sf2_w1w+'</td>'+
                '<td style="text-align:left;">'+val.sf2_w1th+'</td>'+
                '<td style="text-align:left;">'+val.sf2_w1f+'</td>'+
                '<td style="text-align:left;">'+val.sf2_w2m+'</td>'+
                '<td style="text-align:left;">'+val.sf2_w2t+'</td>'+
                '<td style="text-align:left;">'+val.sf2_w2w+'</td>'+
                '<td style="text-align:left;">'+val.sf2_w2th+'</td>'+
                '<td style="text-align:left;">'+val.sf2_w2f+'</td>'+
                '<td style="text-align:left;">'+val.sf2_w3m+'</td>'+
                '<td style="text-align:left;">'+val.sf2_w3t+'</td>'+
                '<td style="text-align:left;">'+val.sf2_w3w+'</td>'+
                '<td style="text-align:left;">'+val.sf2_w3th+'</td>'+
                '<td style="text-align:left;">'+val.sf2_w3f+'</td>'+
                '<td style="text-align:left;">'+val.sf2_w4m+'</td>'+
                '<td style="text-align:left;">'+val.sf2_w4t+'</td>'+
                '<td style="text-align:left;">'+val.sf2_w4w+'</td>'+
                '<td style="text-align:left;">'+val.sf2_w4th+'</td>'+
                '<td style="text-align:left;">'+val.sf2_w4f+'</td>'+
                '<td style="text-align:left;">'+val.sf2_w5m+'</td>'+
                '<td style="text-align:left;">'+val.sf2_w5t+'</td>'+
                '<td style="text-align:left;">'+val.sf2_w5w+'</td>'+
                '<td style="text-align:left;">'+val.sf2_w5th+'</td>'+
                '<td style="text-align:left;">'+val.sf2_w5f+'</td>'+
                '<td style="text-align:left;">'+val.absent+'</td>'+
                '<td style="text-align:left;">'+val.tardy+'</td>'+
                '<td style="text-align:left;">'+val.sf2_remarks+'</td>'+
            '</tr>')
                totalF++;
            })

            combine = totalM+totalF;

            var tdataF,tdTotal;

            for (var i = 1; i <=25; i++) {
                tdataF += '<td>'+totalF+'</td>';
            }

            for (var i = 1; i <=25; i++) {
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
                //window.print();
            }
		}

    });
}