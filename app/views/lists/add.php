<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
<div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
          <h3>Ваши списки:</h3>
          <div class="card card-body">
          <ul class="list-group list-group-flush">
            <?php foreach($data['myLists'] as $list) : ?>
            <li class="list-group-item"><?php echo $list->list_name;?><span class="float-right"><a href="<?php echo URLROOT;?>/lists/show/<?php echo $list->id ?>" class="btn btn-primary btn-sm m-1">Подробнее</a><a href= "<?php echo URLROOT;?>/lists/del/<?php echo $list->id ?>" class="btn btn-primary btn-sm float-right m-1">Удалить</a></span></li>
            <?php endforeach; ?>
            </ul>
            </div>
      </div>
  </div>

    <div class="col-md-4 mx-auto">
      <div class="card card-body bg-light mt-5">
        <?php flash('post_success'); ?>
          <h3>Добавить новый список:</h3>
            <form method="post">
              
              <div class="form-group">
                <label for="list_name">Название нового листа:</label>
                <input type="text" class="form-control <?php echo (!empty($data['list_name_err'])) ? 'is-invalid' : ''; ?>" name='list_name' placeholder="Введите название" value="<?php echo $data['list_name'];?>">
                <span class="invalid-feedback"><?php echo $data['list_name_err']; ?></span>
              </div>
              
              <div class="form-group">
                <label for="list_desc">Пароль</label>
                <textarea rows="5" cols="45" placeholder="Введите краткое описание" name="list_desc" class="form-control <?php echo (!empty($data['list_desc_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['list_desc'];?>"></textarea>
                <span class="invalid-feedback"><?php echo $data['list_desc_err']; ?></span>
              </div>

              <div class="form-row">
                <div class="col">
                  <input type="submit" class="btn btn-primary btn-block" value="Добавить">
                </div>
              </div>

            </form>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>