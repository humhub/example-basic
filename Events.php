<?php

namespace humhubContrib\modules\exampleBasic;

use Yii;
use yii\helpers\Url;

class Events
{
    /**
     * Defines what to do when the top menu is initialized.
     *
     * @param $event
     */
    public static function onTopMenuInit($event)
    {
        $event->sender->addItem([
            'label' => 'Example-basic',
            'icon' => '<i class="fa fa-anchor"></i>',
            'url' => Url::to(['/example-basic/index']),
            'sortOrder' => 99999,
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'example-basic' && Yii::$app->controller->id == 'index'),
        ]);
    }

    /**
     * Defines what to do if admin menu is initialized.
     *
     * @param $event
     */
    public static function onAdminMenuInit($event)
    {
        $event->sender->addItem([
            'label' => 'Example-basic',
            'url' => Url::to(['/example-basic/admin']),
            'group' => 'manage',
            'icon' => '<i class="fa fa-anchor"></i>',
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'example-basic' && Yii::$app->controller->id == 'admin'),
            'sortOrder' => 99999,
        ]);
    }
}
