$('#updateButton').click(function () {
    var formData = $('#updateForm').serialize();

    $.ajax({
        url: '/update',
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function () {
            document.location.reload();
        }
    });
});
$('#deleteButton').click(function () {
    var postId = $('#id').val();
    //e.preventDefault();
    $.ajax({
        url: '/delete',
        type: 'POST',
        data: { id: postId },
        dataType: 'json',
        success: function () {
            window.location.href = '/';
        }
    });
});