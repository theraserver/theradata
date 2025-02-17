<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('title') ?><?= lang('Auth.register') ?> <?= $this->endSection() ?>

<?= $this->section('main') ?>
<div class="container container-tight py-4">
    <div class="text-center mb-4">
        <a href="." class="navbar-brand navbar-brand-autodark">
            <img src="<?= site_url('assets') ?>/static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image">
        </a>
    </div>
    <form class="card card-md" action="<?= url_to('register') ?>" method="post" autocomplete="off">
        <div class="card-body">
            <?php if (session('error') !== null) : ?>
                <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
            <?php elseif (session('errors') !== null) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php if (is_array(session('errors'))) : ?>
                        <?php foreach (session('errors') as $error) : ?>
                            <?= $error ?>
                            <br>
                        <?php endforeach ?>
                    <?php else : ?>
                        <?= session('errors') ?>
                    <?php endif ?>
                </div>
            <?php endif ?>

            <h2 class="card-title text-center mb-4"><?= lang('Auth.register') ?></h2>
            <div class="mb-3">
                <label class="form-label"><?= lang('Auth.username') ?></label>
                <input type="text" class="form-control" name="username" inputmode="text" autocomplete="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label"><?= lang('Auth.email') ?></label>
                <input type="email" class="form-control" name="email" inputmode="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label"><?= lang('Auth.password') ?></label>
                <div class="input-group input-group-flat">
                    <input type="password" class="form-control" name="password" inputmode="text" autocomplete="new-password" placeholder="<?= lang('Auth.password') ?>" required>
                    <span class="input-group-text">
                        <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                            </svg>
                        </a>
                    </span>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label"><?= lang('Auth.passwordConfirm') ?></label>
                <input type="password" class="form-control" name="password_confirm" inputmode="text" autocomplete="new-password" placeholder="<?= lang('Auth.passwordConfirm') ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-check">
                    <input type="checkbox" class="form-check-input" />
                    <span class="form-check-label">Agree the <a href="<?= site_url('assets') ?>/terms-of-service.html" tabindex="-1">terms and policy</a>.</span>
                </label>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100"><?= lang('Auth.register') ?></button>
            </div>
        </div>
    </form>
    <div class="text-center text-secondary mt-3">
        <?= lang('Auth.haveAccount') ?> <a href="<?= url_to('login') ?>" tabindex="-1"><?= lang('Auth.login') ?></a>
    </div>
</div>
<?= $this->endSection() ?>