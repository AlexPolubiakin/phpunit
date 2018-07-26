<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
<h4>Деревня игрока <?php echo $_SESSION['user_login']; ?></h4>	
<div class="village">
    <div class="town_hall">
        <a href="#"><img src="<?php echo URLROOT; ?>/public/img/town_hall.gif">
        <span class="badge badge-pill badge-light">Городской центр</span>
        <span class="badge badge-pill badge-light">Уровень: 1</span></a>
    </div>
    
    <div class="farm1">
        <a href="#"><img src="<?php echo URLROOT; ?>/public//img/farm.gif">
        <span class="badge badge-pill badge-light bp-farm-1">Ферма</span>
        <span class="badge badge-pill badge-light bp-farm-2">Уровень: 1</span></a>
    </div>
    
    <div class="lumbermill1">
        <a href="#"><img src="<?php echo URLROOT; ?>/public//img/lumbermill.gif">
        <span class="badge badge-pill badge-light bp-lumber">Лесопилка</span>
        <span class="badge badge-pill badge-light bp-lumber">Уровень: 1</span></a>
    </div>
    
    <div class="mine1">
        <a href="#"><img src="<?php echo URLROOT; ?>/public//img/mine.gif">
        <span class="badge badge-pill badge-light badge-position">Шахта</span>
        <span class="badge badge-pill badge-light badge-position">Уровень: 1</span></a>
    </div>
    
    <div class="warehouse">
        <a href="#"><img src="<?php echo URLROOT; ?>/public//img/warehouse.gif">
        <span class="badge badge-pill badge-light badge-position">Склад</span>
        <span class="badge badge-pill badge-light badge-position">Уровень: 1</span></a>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
