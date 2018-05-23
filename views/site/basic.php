<?php
use yii\helpers\Html;
$this->title = 'Новини';
?>

    <h1>Останні 5 новин</h1>

<?php
foreach ($news as $item) {
  echo '<div class="item-contain">';
  echo '<h2>' . $item->title . '</h2>';
  echo '<div class="item-image">' .Html::img('/web/uploads/'.$item->picture). '</div>';
  echo '<div class="item-teaser">' . $item->teaser . '</div>';
  echo Html::a('Читати...', ['newsmodule/news/view', 'id' => $item->id], ['class' => 'btn btn-primary']);
  echo '</div>';
}
?>

//<?php //$this->registerJsFile('@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset']) ?>
<?php //$this->registerJs("$('.container').append('<p>SHOW!!!</p>');", \yii\web\View::POS_LOAD) ?>
<?php $this->registerCssFile('web/css/basic.css');?>

