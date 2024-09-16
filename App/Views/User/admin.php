<?php require __DIR__ . '/../header_auth.php' ?>

<?php ?>

<body>
    <!-- Основной контент -->
    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Боковая панель -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">Dashboard</a>
                    <a href="#" class="list-group-item list-group-item-action">Manage Users</a>
                    <a href="#" class="list-group-item list-group-item-action">Manage Posts</a>
                    <a href="#" class="list-group-item list-group-item-action">Categories</a>
                    <a href="#" class="list-group-item list-group-item-action">Comments</a>
                </div>
            </div>

            <!-- Панель управления -->
            <div class="col-md-9">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Overview</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card bg-primary text-white mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Users</h5>
                                        <p class="card-text">120</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-success text-white mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Posts</h5>
                                        <p class="card-text">350</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-warning text-white mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Comments</h5>
                                        <p class="card-text">500</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Список постов -->
                <div class="card">
                    <div class="card-header">
                        <h4>Recent Posts</h4>
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
                                <tr>
                                    <td>1</td>
                                    <td>How to Learn PHP</td>
                                    <td><span class="badge bg-success">Published</span></td>
                                    <td>2024-08-10</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Getting Started with JavaScript</td>
                                    <td><span class="badge bg-danger">Draft</span></td>
                                    <td>2024-08-08</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <!-- Другие посты -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>