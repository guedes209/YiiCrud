<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\bootstrap5\Carousel;

$this->title = 'Produtos Mercado Livre';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="d-flex justify-content-between align-items-center">
        <ul class="list-group list-group-horizontal">
            <div class="row">
                <?php foreach($data as $d) {
                    $img = [];
                    foreach($d->pictures as $pic){
                        $img[] = [
                            'content' => '<img src="'. $pic->url .'" class="rounded mx-auto d-block" style="max-height: 330px; max-width:380px; min-height: 330px; min-width:380px; margin-bottom: 10px"/>'
                        ];
                    }
                    ?>
                    <li class="list-group-item col-lg-4 col-md-6 col-sm-12 col-12" style="border: white solid; border-width:10px;">
                        <div>
                            <?php echo Carousel::widget([
                                'items' => $img
                            ]);?>
                        </div>
                        <div class="card" style="border: 0px;">
                            <h6><?= $d->title ?></h6>
                            <div class="d-flex justify-content-between">
                                <p>Id: <?= $d->id ?></p>
                                <p>Categoria: <?= $d->category_id ?></p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Quantidade disponível: <?= $d->available_quantity ?></p>
                                <p>Preço: R$<?= str_replace('.', ',', strval($d->price)); ?></p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a style="text-decoration: none;" target=”_blank” href=<?= $d->thumbnail ?>>Thumbnail</a>
                                <a style="text-decoration: none;" target=”_blank” href=<?= $d->permalink ?>>Link do Produto</a>
                            </div>
                        </div>
                        </li>
                <?php }?>
            </div>
        </ul>
    </div>
</div>