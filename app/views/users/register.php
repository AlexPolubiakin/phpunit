<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-4 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h3>Введите ваши данные для регистрации:</h3>
                    <form method="post">
                        <div class="form-group">
                            <label for="">Логин:</label>
                            <input type="text" class="form-control <?php echo (!empty($data['login_err'])) ? 'is-invalid' : ''; ?>" id="exampleInputText" name="login" placeholder="Введите ваш логин" value="<?php echo $data['login']; ?>">
                            <span class="invalid-feedback"><?php echo $data['login_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль:</label>
                            <input type="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" name="password" placeholder="Введите ваш пароль" value="<?php echo $data['password']; ?>">
                            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password_conf">Повторите пароль:</label>
                            <input type="password" class="form-control <?php echo (!empty($data['password_conf_err'])) ? 'is-invalid' : ''; ?>" name="password_conf" placeholder="Введите ваш пароль повторно" value="<?php echo $data['password_conf']; ?>">
                            <span class="invalid-feedback"><?php echo $data['password_conf_err']; ?></span>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <input type="submit" class="btn btn-primary btn-block" value="Регистрация">
                            </div>
                            <div class="col">
                                <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Есть аккаунт? Войти</a>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>