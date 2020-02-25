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