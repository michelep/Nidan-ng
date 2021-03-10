$('.ajax-dialog').on('click', function () {
    var elementId = $(this).data('id');
    $("#popup-dialog").modal("show");
    //call the API we just made
    $.ajax({
	type: 'POST',
	contentType: 'application/json; charset=utf-8',
	url: '/ajaxCb.php',
	data: {action:"dialog", id:elementId},
	success: function (data) {
    	    console.log(data);
	    $("#modal-dialog-title").html(data.title);
	    $("#modal-dialog-body").html(data.body);
	},
	error: function (xhr, textStatus, error) {
    	    var response = JSON.parse(xhr.responseText);
    	    console.log(response.message);
	}
    });
});