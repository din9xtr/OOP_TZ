$(document).ready(function () {
    $('#loadMore').on('click', function () {
        const limit = 3;
        const offset = $('#posts .post').length;
        const page = $(this).attr('data-page');
        const sort = $('#sortType').val();
     
        $.ajax({
            url: '/post/loadMore',
            type: 'GET',
            data: { limit: limit, offset: offset, page: page, sort: sort },
            success: function (response) {

                if (response.trim() === '') {
                    $('#loadMore').hide();
                } else {
                    $('#posts').append(response);
                }
            }
        });
    });

});

