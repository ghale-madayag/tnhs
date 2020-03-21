$(document).ready(function(){

	$.ajax({
		type: "POST",
		url: "data/sf3-handler.php",
        data: "print=true",
		cache: false,
		success: function(data){
            var json = $.parseJSON(data);
            var arr = [];
            $(json).each(function(i,val){
                var value = val.sf_no;
               
                if (arr.indexOf(value) == -1){
                    get_td(val.sf_no, val.fullname, 'M');
                    arr.push(value);
                }
            })

            print_female();
           
		}

    });
})

function print_female() {
    $.ajax({
		type: "POST",
		url: "data/sf3-handler.php",
        data: "printF=true",
		cache: false,
		success: function(data){
            var json = $.parseJSON(data);
            var arr = [];
            $(json).each(function(i,val){
                var value = val.sf_no;
               
                if (arr.indexOf(value) == -1){
                    get_td(val.sf_no, val.fullname,'F');
                    arr.push(value);
                }
            })
		}

    });
}

function get_td(val, fullname,sex){
    var result = $(".sf-print tr:last");
    $.ajax({
		type: "POST",
		url: "data/sf3-handler.php",
		data: "get_td=true&val="+val+"&sex="+sex,
        cache: false,
        success: function(data){
            var total;
            var table = '<tr>';    
            table +='<td></td>'+
            '<td style="text-align:left;">'+fullname+'</td>'+val.td;
            
            var json = $.parseJSON(data);
            $(json).each(function(i,val){
                table += '<td>'+val.issued+'</td><td>'+val.returned+'</td>';
                total = val.total;
            })
            for (var j=total; j<=10; j++){
                if(j!=10){
                    table += '<td></td><td></td>';
                }else{
                    table += '<td></td>';
                    break;
                }
            }

            result.after(table)
            table += '</tr>';
        }
    });
}
