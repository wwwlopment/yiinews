<?php
/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\LinkPager;

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


      <?php
      if (isset ($news)) {
        echo '<h1>Останні 5 новин :</h1>';
        foreach ($news as $item) {
          echo '<div class="item-contain">';
          echo '<h2>' . $item->title . '</h2>';
          echo '<div class="item-image">' . Html::img('/web/uploads/' . $item->picture) . '</div>';
          echo '<div class="item-teaser">' . $item->teaser . '</div>';
          echo Html::a('Читати...', ['show', 'id' => $item->id], ['class' => 'btn btn-primary']);
          echo '</div> </br>';
        }
      }
      ?>
    </div>
</div>
<?php
if (isset ($models)) {
  echo '<h1>Всі новини :</h1>';
  foreach ($models as $model) {
    echo '<div class="item-contain">';
    echo '<h2>' . $model->title . '</h2>';
    echo '<div class="item-image">' . Html::img('/web/uploads/' . $model->picture) . '</div>';
    echo '<div class="item-teaser">' . $model->teaser . '</div>';
    echo Html::a('Читати...', ['show', 'id' => $model->id], ['class' => 'btn btn-primary']);
    echo '</div> </br>';
  }
}

if (isset ($pages)) {
  echo LinkPager::widget([
    'pagination' => $pages,
  ]);
}
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>



<?php $this->registerCssFile('@web/css/basic.css'); ?>

