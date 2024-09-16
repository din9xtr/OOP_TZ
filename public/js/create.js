$('#createButton').click(function () {
    var formData = $('#createForm').serialize();

    $.ajax({
        url: '/post/create',
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function () {
            window.location.href = '/';
        }
    });
});