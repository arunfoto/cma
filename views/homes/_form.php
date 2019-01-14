<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Homes */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile(
	'@web/js/main.js',
	['depends' => [\yii\web\JqueryAsset::className()]]
);
?>
<div class="homes-form col-md-8">

<?php $form = ActiveForm::begin(['options' => [
			'class'                                 => 'myform'
		]]);?>

<?=$form->field($model, 'firstname')->textInput(['maxlength' => true])?>

<?=$form->field($model, 'lastname')->textInput(['maxlength' => true])?>

<?=$form->field($model, 'email')->textInput(['maxlength' => true])?>

<?=$form->field($model, 'phone')->textInput(['maxlength' => true])?>

<?=$form->field($model, 'address')->textarea(['rows' => 6])?>

<?=$form->field($model, 'home_sqft')->textInput()?>

<?php /*=$form->field($model, 'form_submit')->textInput() */?>
<div class="form-group">
<?=Html::submitButton('Save', ['class' => 'btn btn-success'])?>
</div>

<?php ActiveForm::end();?>
</div>

