<?php require __DIR__ . '/../header_auth.php' ?>
<body>
    <div class="container mt-5">
        <h1>Create Post</h1>
        <form id="createForm" action="/post/create" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="post_text" class="form-label">Content</label>
                <textarea name="post_text" id="post_text" class="form-control" rows="5" required></textarea>
            </div>
            <input type="hidden" name="author" value="current_user">
            <button type="button" id="createButton" class="btn btn-primary">Create Post</button>
        </form>
    </div>
    <script src="/public/js/create.js"> </script>
</body>

</html>