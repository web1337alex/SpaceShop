<?php
/**
 * @var $slides object
 */
?>
<?php if(!empty($slides)):?>
    <div class="container-fluid my-carousel">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-indicators">
                <?php for ($i = 0; $i < count($slides); $i++): ?>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?=$i?>>" class="<?php if($i === 0):?>active<?php endif;?>" aria-current="true" aria-label="Slide <?=($i + 1)?>"></button>
                <?php endfor;?>
            </div>
            <div class="carousel-inner">
                <?php $i = 1; foreach ($slides as $slide):?>
                    <div class="carousel-item <?php if($i === 1):?>active<?php endif;?>">
                        <img src="<?= rtrim(PATH, '/') . $slide->img ?>" class="d-block w-100" alt="">
                    </div>
                    <?php $i++; endforeach;?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
<?php endif?>