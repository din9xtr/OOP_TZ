<?php require __DIR__ . '/../header.php' ?>



<body>

    <article class="container mt-5">
        <section class="row">
            <?php

            if ($user): ?>
                <div id="auth_content" class="col-md-8 mb-3">
                    <h4>Welcome, <?= htmlspecialchars($user['login']) ?>!</h4>
                    <?php if

                    ($user['role'] === 'admin'): ?>
                        <p>Admin content </p>
                    <?php elseif ($user['role'] === 'editor'): ?>
                        <p>Editor content </p>
                    <?php elseif ($user['role'] === 'user'): ?>
                        <p>Regular user content</p>
                    <?php endif; ?>
                <?php else: ?>

                    <div id="auth_form" class="col-md-8 mb-3">
                        <h4> Auntefication</h4>
                        <form action="/user/auth_user" method="POST">

                            <label for="username">Логин</label>
                            <input type="text" name="login" id="login" class="form-control">

                            <label for="username">Пароль</label>
                            <input type="password" name="password" id="password" class="form-control">

                            <div class="alert alert-danger mt-2" id="errorBlock" style="display: none;"> </div>
                            <div class="alert alert-success mt-2" id="successBlock" style="display: none;"> </div>

                            <button type="button" id="auth_user" class="btn btn-success mt-3">Log in</button>

                        </form>

                    </div>
                <?php endif; ?>
                <div class="col-6 col-md-4 mt-5">
                    <button class="btn btn-danger" id="exit_btn">Exit</button>
                </div>
        </section>
    </article>



</body>
<script src="/public/js/user/auth.js"> </script>
</html>