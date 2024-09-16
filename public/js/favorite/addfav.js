$('#addfavoriteButton').click(function () {
    const formData = $('#addfavorite').serialize(),
        $this = $(this);

    $.ajax({
        url: '/favorite_add',
        type: 'POST',
        data: formData,
        cache: false,
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                $this.text('Remove from Favorites')
                document.location.reload();
            } else {
                $this.text('Add to Favorites');
                document.location.reload();
            }
        },
        error: function () {
            alert('ЭРРОР');
        }
    });
});