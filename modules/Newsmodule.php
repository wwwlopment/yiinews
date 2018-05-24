<?php

namespace app\modules;

/**
 * newsmodule module definition class
 */
class newsmodule extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $layout = '/main';

    public $controllerNamespace = 'app\modules\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
