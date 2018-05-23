<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
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
      ['label' => 'Home', 'url' => ['/']],
      ['label' => 'News', 'url' => ['/newsmodule/news/index']],
      ['label' => 'Comments', 'url' => ['/newsmodule/newscomments/index']],
    ],
  ]);
  NavBar::end();
  ?>

    <div class="container">
      <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
      ]) ?>
      <?= Alert::widget() ?>


        <h1>Останні 5 новин</h1>

      <?php
      foreach ($news as $item) {
        echo '<div class="item-contain">';
        echo '<h2>' . $item->title . '</h2>';
        echo '<div class="item-image">' .Html::img('/web/uploads/'.$item->picture). '</div>';
        echo '<div class="item-teaser">' . $item->teaser . '</div>';
        echo Html::a('Читати...', ['show', 'id' => $item->id], ['class' => 'btn btn-primary']);
        echo '</div> </br>';
      }
      ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>



<?php $this->registerCssFile('web/css/basic.css');?>

