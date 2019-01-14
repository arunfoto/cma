<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Homes */

$this->title                   = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Homes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="homes-view">

    <h1><?=Html::encode($this->title)?></h1>

    <p>
<?=Html::a('Update', ['update', 'id'         => $model->id], ['class'         => 'btn btn-primary'])?>
        <?=Html::a('Delete', ['delete', 'id' => $model->id], [
		'class'                                    => 'btn btn-danger',
		'data'                                     => [
			'confirm'                                 => 'Are you sure you want to delete this item?',
			'method'                                  => 'post',
		],
	])?>
</p>

<?=DetailView::widget([
		'model'      => $model,
		'attributes' => [
			'id',
			'firstname',
			'lastname',
			'email:email',
			'phone',
			'address:ntext',
			'home_sqft',
			[
				'label' => 'Form Submitted',
				'value' =>

function ($model) {
					return ($model->form_submit)?'Yes':'No';
				}
			],
			[
				'attribute' => 'date_submit',
				//'format' => ['raw', 'Y-m-d H:i:s'],
				'format' => ['date', 'php:d-m-Y'],
			],
		],
	])?>
</div>
