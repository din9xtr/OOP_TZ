<?php require __DIR__ . '/../header_auth.php' ?>

<body>

    <div class="container mt-5">
        <div class="btn-group mb-4">

            <a href="/?type=latest" class="btn btn-secondary <?= $type === 'latest' ? 'active' : '' ?>">Latest Posts</a>
            <a href="/?type=popular" class="btn btn-secondary <?= $type === 'popular' ? 'active' : '' ?>">Popular
                Posts</a>
            <input type="hidden" id="sortType" value="<?= $_GET['type'] ?>">

        </div>
        <div id="posts">
            <?php foreach ($posts as $post): ?>
                <div class="post mb-4">
                    <h2><?= $post->title ?></h2>
                    <p><?= $post->post_text ?></p>
                    <p>Views: <?= $post->getViewCount($post->id) ?></p>
                    <a href="/post/show/<?= $post->id ?>" class="btn btn-primary">Read more</a>
                </div>
            <?php endforeach; ?>
        </div>
        <div>
            <?php require __DIR__ . '/../pagination.php' ?>

        </div>

    </div>
    <script src="/public/js/loadmore.js"> </script>
</body>

</html>