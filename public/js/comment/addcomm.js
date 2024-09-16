$('#add_comment').click(function () {
    var formData = $('#add_comment_form').serialize();

    $.ajax({
        url: '/add_comment',
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function (response) {
            if (response.success){
            alert('Comment add, W8 for admin approved');
            } else {
                alert('ERROR');
            }
        }
    });
});