    <form class="form-signin" action="<?= base_url() ?>login/login" method="post">
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal">LOGIN ADMIN</h1>
         </div>

        <div class="form-label-group">
            <input class="form-control" type="text" name='username'>
            <label for="username">Username</label>
        </div>

        <div class="form-label-group">
            <input class="form-control" type="password" name='password'>
            <label for="inputPassword">Password</label>
        </div>

        <button type='submit' class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p>
    </form>