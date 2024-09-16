<section> <!-- add comment-->

<div>
    <?php if (($user->role != '') && ($user->role != 'guest')): ?>

        <form id="add_comment_form" method="post" action="/add_comment">
            <div class="mb-3">
                <label for="comment" class="form-label">Leave a comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
            </div>
            <input type="hidden" name="post_id" value="<?= $post->id ?>">
            <input type="hidden" name="user_id" value="<?= $user->id ?>">
            <button type="button" id="add_comment" class="btn btn-primary">Submit</button>
        </form>



    </div>
 <!-- fav-->
    <div>

        <?php if (($favorites == true)): ?>
            <form id="removefavorite" action="/favorite_remove" method="post" style="hidden">
                <input type="hidden" name="post_id" value="<?= $post->id ?>">
                <input type="hidden" name="user_id" value="<?= $user->id ?>">
                <button type="button" id="removefavoriteButton" class="btn btn-outline-warning mt-3">Remove from
                    Favorites</button>
            </form>
        <?php else: ?>
            <form id="addfavorite" action="/favorite_add" method="post" style="hidden">
                <input type="hidden" name="post_id" value="<?= $post->id ?>">
                <input type="hidden" name="user_id" value="<?= $user->id ?>">
                <button type="button" id="addfavoriteButton" class="btn btn-outline-warning mt-3">Add to
                    Favorites</button>
            </form>
        <?php endif; ?>
    <?php else: ?>
        <p>Please <a href="/user/auth">log in</a> </p>
    <?php endif; ?>

</div>
</section>