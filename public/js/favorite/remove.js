$('#removefavoriteButton').click(function () {
    const formData = $('#removefavorite').serialize(),
        $this = $(this);

    $.ajax({
        url: '/favorite_remove',
        type: 'POST',
        data: formData,
        cache: false,
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                $this.text('Add to Favorites')
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