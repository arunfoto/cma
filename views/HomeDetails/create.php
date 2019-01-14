<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HomeDetails */

$this->title = 'Create Home Details';
$this->params['breadcrumbs'][] = ['label' => 'Home Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
