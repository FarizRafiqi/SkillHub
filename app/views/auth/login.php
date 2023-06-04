<div class="container container-sm" id="login">
    <div class="card shadow-lg">
        <div class="card-body">
            <h2 class="text-center">LOGIN</h2>
            <?php Flasher::flash(); ?>
            <form action="<?= BASEURL; ?>/autentikasi/process" method="POST">
                <div class="mb-5">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Masukkan Email">
                    <?php if (isset($errors["email"])) : ?>
                        <div class="text-red-500 my-2 text-sm error-message">
                            <?= $errors["email"]; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-5">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
                    <?php if (isset($errors["password"])) : ?>
                        <div class="text-red-500 my-2 text-sm error-message">
                            <?= $errors["password"]; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3s">
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>