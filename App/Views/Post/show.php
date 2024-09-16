
<?php
if (isset($_COOKIE['auth_user'])){require __DIR__.'/../header_auth.php';} else {require __DIR__ . '/../header.php';}
?>

<body>
    <div class="container mt-5">

        <h1><?= $post->title ?></h1>
        <p><?= $post->post_text ?></p>
        <span>Author: <?= $post->author ?></span><br>
        <span>Time:</b> <u><?= $post->getDate() ?></u></span><br>
        <span>Views: <?= $post->getViewCount($post->id) ?></span><br>

        <?php require __DIR__.'/show_comments.php'?>
       
        
        <?php require __DIR__.'/show_add_com_fav.php'?>

        <section> <!-- edit--> 
            <?php if (($post->author == $_COOKIE['auth_user'] && ($user->role === 'editor')) || ($user->role === 'admin')): ?>
                <?php require __DIR__ . '/show_edit.php'; ?>
            <?php endif; ?>
        </section>


    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="/public/js/show.js"> </script>
<script src="/public/js/favorite/addfav.js"> </script>
<script src="/public/js/favorite/remove.js"> </script>
<script src="/public/js/comment/addcomm.js"> </script>
<script src="/public/js/comment/status.js"> </script>

</html>