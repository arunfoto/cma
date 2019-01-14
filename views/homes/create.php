<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Homes */

$this->title = 'Create Homes';
$this->params['breadcrumbs'][] = ['label' => 'Homes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="homes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
