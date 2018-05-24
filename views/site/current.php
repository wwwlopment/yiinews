<?php
/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;
//use app\assets\AppAsset;

//AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
  <?php
  NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
      'class' => 'navbar-inverse navbar-fixed-top',
    ],
  ]);
  echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => [
      ['label' => 'На головну', 'url' => ['/']],
      ['label' => 'Всі новини', 'url' => ['/site/news']],
      ['label' => 'Адміністрування новин', 'url' => ['/newsmodule/news/index']],
      ['label' => 'Адміністрування коментарів', 'url' => ['/newsmodule/comments/index']],
    ],
  ]);
  NavBar::end();
  ?>

    <div class="container">
      <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
      ]) ?>
      <?= Alert::widget() ?>

      <?= '<div class="item-contain">' ?>
      <?= '<h1>' . $shownews['title'] . '</h1>' ?>
      <?= '<div class="item-image">' . Html::img('/web/uploads/' . $shownews['picture']) . '</div>' ?>
      <?= '<div class="item-content">' . $shownews['content'] . '</div>' ?>


      <?php if (empty($showcomments)):echo '<hr><h5>Відсутні будь-які коментарії до даної новини</h5><hr>'; else: echo '<hr><H4>Коментарі :</H4><hr>'; endif; ?>

      <?php foreach ($showcomments as $comment): ?>
      <?= '<div class="comment-wrapper">' ?>
      <?= '<div class="comment-author">' . $comment['date'] . '</div>' ?>
      <?= '<div class="comment-author">Автор :' . $comment['author_name'] . '</div>' ?>
      <?= '<div class="comment-text">' . $comment['comment'] . '</div>' ?>
      </div>
      <?php endforeach; ?>

  <?php $form = ActiveForm::begin(); ?>
  <?= $form->field($model, 'author_name')->label('Автор') ?>
  <?= $form->field($model, 'comment')->textarea(['rows' => 6])->label('Коментар') ?>
  <?= $form->field($model, 'news_id')->hiddenInput(['value' => $shownews['id']])->label(false) ?>
    <div class="form-group">
      <?= Html::submitButton('Додати коментар', ['class' => 'btn btn-primary']) ?>
    </div>

  <?php ActiveForm::end(); ?>


</div>

</div>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<?php $this->registerCssFile('@web/css/basic.css'); ?>

