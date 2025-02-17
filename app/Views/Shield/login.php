<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('title') ?><?= lang('Auth.login') ?> <?= $this->endSection() ?>

<?= $this->section('main') ?>

<div class="container container-normal py-4">
    <div class="row align-items-center g-4">
        <div class="col-lg">
            <div class="container-tight">
                <div class="text-center mb-4">
                    <a href="." class="navbar-brand navbar-brand-autodark"><img src="<?= site_url('assets') ?>/static/logo.svg" height="36" alt=""></a>
                </div>
                <div class="card card-md">
                    <div class="card-body">
                        <h2 class="h2 text-center mb-4"><?= lang('Auth.login') ?></h2>

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

                        <?php if (session('message') !== null) : ?>
                            <div class="alert alert-success" role="alert"><?= session('message') ?></div>
                        <?php endif ?>

                        <form action="<?= url_to('login') ?>" method="post" autocomplete="off">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <label class="form-label"><?= lang('Auth.email') ?></label>
                                <input type="email" class="form-control" name="email" inputmode="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">
                                    <?= lang('Auth.password') ?>
                                    <span class="form-label-description">
                                        <a href="<?= url_to('magic-link') ?>"><?= lang('Auth.forgotPassword') ?></a>
                                    </span>
                                </label>
                                <div class="input-group input-group-flat">
                                    <input type="password" class="form-control" name="password" inputmode="text" autocomplete="current-password" placeholder="<?= lang('Auth.password') ?>" required>
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
                            <?php if (setting('Auth.sessionConfig')['allowRemembering']): ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')): ?> checked<?php endif ?>>
                                        <?= lang('Auth.rememberMe') ?>
                                    </label>
                                </div>
                            <?php endif; ?>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary w-100"><?= lang('Auth.login') ?></button>
                            </div>
                        </form>
                    </div>
                    <div class="hr-text">or</div>
                    <div class="card-body">
                        <?php if (setting('Auth.allowRegistration')) : ?>
                            <p class="text-center"><?= lang('Auth.needAccount') ?> <a href="<?= url_to('register') ?>"><?= lang('Auth.register') ?></a></p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg d-none d-lg-block">
            <img src="<?= site_url('assets') ?>/static/illustrations/undraw_secure_login_pdn4.svg" height="300" class="d-block mx-auto" alt="">
        </div>
    </div>
</div>
<?= $this->endSection() ?>