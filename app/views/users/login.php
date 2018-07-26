<?php require APPROOT . '/views/inc/header.php'; ?>


<div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body bg-light mt-5">
        <?php flash('register_success'); ?>
          <h3>Введите ваш логин и пароль:</h3>
            <form method="post">
              
              <div class="form-group">
                <label for="login">Логин</label>
                <input type="text" class="form-control <?php echo (!empty($data['login_err'])) ? 'is-invalid' : ''; ?>" name='login' placeholder="Введите ваш логин" value="<?php echo $data['login'];?>">
                <span class="invalid-feedback"><?php echo $data['login_err']; ?></span>
              </div>
              
              <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" name='password' placeholder="Введите ваш пароль" value="<?php echo $data['password'];?>">
                <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
              </div>

              <div class="form-row">
                <div class="col">
                  <input type="submit" class="btn btn-primary btn-block" value="Вход">
                </div>
                <div class="col">
                  <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-light btn-block">Нет аккаунта? Зарегестрироваться!</a>
                </div>
              </div>

            </form>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>