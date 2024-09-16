
<div id="feedback" class="alert" style="display: none;"></div>

<form action="/update" id="updateForm" method="post">

    <input type="hidden" name="id" id="id" value="<?= $post->id ?>">

    <div type="" class="mb-3" id="admin_content">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="<?= $post->title ?>" required>
    </div>

    <div type="" class="mb-3" id="admin_content">
        <label for="post_text" class="form-label">Content</label>
        <textarea name="post_text" class="form-control" rows="5" required><?= $post->post_text ?></textarea>
    </div>

    <button type="button" id="updateButton" class="btn btn-primary">Update Post</button>
    <button type="button" id="deleteButton" class="deleteButton btn btn-danger">Delete</button>

</form>

