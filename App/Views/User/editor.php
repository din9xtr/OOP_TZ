<?php require __DIR__ . '/../header_auth.php' ?>


<body>
    

    <!-- Основной контент -->
    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Боковая панель -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">Dashboard</a>
                    <a href="#" class="list-group-item list-group-item-action">My Posts</a>
                    <a href="#" class="list-group-item list-group-item-action">Categories</a>
                    <a href="#" class="list-group-item list-group-item-action">Comments</a>
                </div>
            </div>

            <!-- Панель управления -->
            <div class="col-md-9">
                <!-- Overview -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Overview</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card bg-primary text-white mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Posts</h5>
                                        <p class="card-text"><?= $totalPosts ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-success text-white mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Published</h5>
                                        <p class="card-text"><?= $publishedPosts ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-warning text-white mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Drafts</h5>
                                        <p class="card-text"><?= $draftPosts ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Список постов -->
                <div class="card">
                    <div class="card-header">
                        <h4>My Posts</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($myPosts as $post): ?>
                                <tr>
                                    <td><?= $post->id ?></td>
                                    <td><?= $post->title ?></td>
                                    <td>
                                        <span class="badge <?= $post->status === 'Published' ? 'bg-success' : 'bg-danger' ?>">
                                            <?= $post->status ?>
                                        </span>
                                    </td>
                                    <td><?= $post->created_at ?></td>
                                    <td>
                                        <a href="/post/edit/<?= $post->id ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="/post/delete/<?= $post->id ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
