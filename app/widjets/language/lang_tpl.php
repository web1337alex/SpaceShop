<?php
    use CORE\App;
?>

<div class="dropdown d-inline-block">
    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
        <img src="<?=WIDJETS?>/language/img/<?=App::$app->getProperty('language')['code']?>.png" alt="">
    </a>
    <ul class="dropdown-menu" id="languages">
        <?php foreach ($this->languages as $k => $v):?>
            <?if(App::$app->getProperty('language')['code'] == $k) continue;?>
            <li>
                <button class="dropdown-item" data-langcode="<?=$k?>">
                    <img src="<?=WIDJETS?>/language/img/<?=$k?>.png" alt="">
                    <?=$v['title']?></button>
            </li>
        <?php endforeach;?>
    </ul>
</div>