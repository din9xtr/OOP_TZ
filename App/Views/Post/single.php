<div class="post mb-4">
    <h2><?= htmlspecialchars($post->title) ?></h2>
    <p><?= htmlspecialchars($post->post_text) ?></p>
    <p>Views: <?= $post->getViewCount($post->id) ?></p>
    <a href="/post/show/<?= htmlspecialchars($post->id) ?>" class="btn btn-primary">Read more</a>
</div>
