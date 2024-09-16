$(document).on('click', '.status_approved', function () {
    const $this = $(this),
        formData = $this.closest('form').serialize()



    $.ajax({
        url: '/comment_status',
        type: 'POST',
        data: formData,
        cache: false,
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                alert('APPROVED');
                document.location.reload();
            } else {
                alert('ERROR')
                document.location.reload();
            }
        },
        error: function () {
            alert('ЭРРОР');
        }
    });
});
$(document).on('click', '.status_rejected', function () {
    const $this = $(this),
        formData = $this.closest('form').serialize()

    $.ajax({
        url: '/comment_status',
        type: 'POST',
        data: formData,
        cache: false,
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                alert('REJECT');
                document.location.reload();
            } else {
                alert('ERROR')
                document.location.reload();
            }
        },
        error: function () {
            alert('ЭРРОР');
        }
    });
});