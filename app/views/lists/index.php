<?php require APPROOT . '/views/inc/header.php'; ?>
    
<div class="col-md-6 mx-auto mb-3">
        
        <div class="card text-center mt-2">
            <div class="card-header">
                <a class="navbar-brand text-dark float-left" href="#">Мои списки:</a>
                <ul class="nav nav-pills card-header-pills float-right">
                    <li class="nav-item mx-2">
                    <a href="<?php echo URLROOT?>/lists/add" class="btn btn-primary btn-sm">Новый список/Редактировать</a>
                    </li>
                </ul>
            </div>
        </div>


        <?php foreach($data['lists'] as $list) : ?>
        <div class="row">
        <div class="card card-body bg-light mt-3">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo $list->list_name; ?></h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $list->author_name; ?></h5>
                    <p class="card-text"><?php echo $list->list_desc; ?></p>
                    <a href="<?php echo URLROOT?>/lists/show/<?php echo $list->id; ?>" class="btn btn-primary float-right">Подробнее</a>
                </div>
            </div>
        </div> 
    </div>
        <?php endforeach; ?>
               

  
  
</div>







<?php require APPROOT . '/views/inc/footer.php'; ?>