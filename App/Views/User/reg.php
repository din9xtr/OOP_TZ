<?php require __DIR__ . '/../header.php' ?>


<body>

    <article class="container mt-5">
        <section class="row">
            <div class="col-md-8 mb-3">
                <h4> Register form</h4>
                <form action="/user/reg" method="POST">

                    <label for="username">Логин</label>
                    <input type="text" name="login" id="login" class="form-control">

                    <label for="username">Пароль</label>
                    <input type="password" name="password" id="password" class="form-control">

                    <label for="username">Email</label>
                    <input type="email" name="email" id="email" class="form-control">

                    <div class="alert alert-danger mt-2" id="errorBlock" style="display: none;"> </div>
                    
                    <div class="alert alert-success mt-2" id="successBlock" style="display: none;"> </div>
                    
                    <div class="alert alert-primary" id="successRedir" style="display: none;">
                        <?php echo '<a href="/" class="btn btn-success">Authorization</a>' ?>
                    </div>
                    
                    <button type="button" id="reg_user" class="btn btn-success mt-3">
                        Sign-UP
                   
                    </button>
                </form>
            </div>
        </section>
    </article>
</body>
<script src="/public/js/user/reg.js"> </script> 

</html>