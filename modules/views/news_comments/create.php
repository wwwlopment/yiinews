<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NewsComments */

$this->title = 'Create News Comments';
$this->params['breadcrumbs'][] = ['label' => 'News Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-comments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
