<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Homes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="homes-index">

    <h1><?=Html::encode($this->title)?></h1>

    <p>
<?=Html::a('Create Homes', ['create'], ['class' => 'btn btn-success'])?>
</p>

<?=GridView::widget([
		'dataProvider' => $dataProvider,
		'columns'      => [
			['class'      => 'yii\grid\SerialColumn'],

			'id',
			'firstname',
			'lastname',
			'email:email',
			'phone',
			//'address:ntext',
			//'home_sqft',
			//'form_submit',
			[
				'attribute' => 'date_submit',
				//'format' => ['raw', 'Y-m-d H:i:s'],
				'format' => ['date', 'php:d-m-Y'],
			],

			['class' => 'yii\grid\ActionColumn'],
		],
	]);?>
</div>
