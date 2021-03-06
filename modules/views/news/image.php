<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>


  <div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>
