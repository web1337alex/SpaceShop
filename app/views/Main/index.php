<?php
/**
 * @var $products array
 * @var $slides array
 * @var $this View
 */

use \CORE\View;

$this->getPart('parts/slider', compact('slides'));
debug($_SESSION);
$this->getPart('parts/main_products', compact('products'));

?>

<section class="services">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="section-title">Наши преимущества</h3>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="service-item">
                    <p class="text-center"><i class="fas fa-shipping-fast"></i></p>
                    <p>Прямые поставки от производителей</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="service-item">
                    <p class="text-center"><i class="fas fa-cubes"></i></p>
                    <p>Широкий ассортимент товара</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="service-item">
                    <p class="text-center"><i class="fas fa-hand-holding-usd"></i></p>
                    <p>Приятные и конкуретные цены</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="service-item">
                    <p class="text-center"><i class="fas fa-user-cog"></i></p>
                    <p>Профессиональная консультация и сервис</p>
                </div>
            </div>

        </div>
    </div>
</section>