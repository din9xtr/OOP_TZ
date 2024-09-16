<?php require __DIR__ . '/../header_auth.php' ?>


<body>
   

    <!-- Основной контент -->
    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Боковая панель -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">Posts</a>
            
                </div>
            </div>

            <!-- Панель управления -->
            <div class="col-md-9">
                <!-- Subscribed Posts -->
                <div class="card mb-4">
                    <div class="card-header">
                        <?php //var_dump($favorites);die(); 

                        if (isset($favorites) && !empty($favorites)) {
                            echo "<h2>Your Favorite Posts:</h2><ul>"; ?>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php foreach ($post as $fpost): ?>
                                    <div class="col-md-4">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $fpost->title ?></h5>
                                                <p class="card-text"><?= $fpost->post_text ?></p>
                                                <a href="/post/show/<?= $fpost->id ?>" class="btn btn-primary btn-sm">Read
                                                    more</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;
                        } else {
                            echo "<p>NO FAVORITE</p>";
                        } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>