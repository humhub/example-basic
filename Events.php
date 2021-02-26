<?php

namespace acmeCorp\humhub\modules\exampleBasic;

use humhub\modules\admin\permissions\ManageModules;
use humhub\modules\admin\widgets\AdminMenu;
use humhub\modules\ui\menu\MenuLink;
use humhub\widgets\TopMenu;
use Yii;
use yii\base\Event;

class Events
{
    /**
     * Defines what to do when the top menu is initialized.
     *
     * @param $event
     *
     * @return void
     */
    public static function onTopMenuInit($event): void
    {
        /** @var TopMenu $topMenuWidget */
        $topMenuWidget = $event->sender;

        $topMenuWidget->addEntry(new MenuLink([
            'label' => Yii::t('ExampleBasicModule.base', 'Example'),
            'icon' => 'anchor',
            'url' => ['/example-basic/index'],
            'sortOrder' => 99999,
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'example-basic' && Yii::$app->controller->id == 'index'),
        ]));
    }

    /**
     * Defines what to do if admin menu is initialized.
     *
     * @param $event Event
     *
     * @return void
     */
    public static function onAdminMenuInit($event): void
    {
        /** @var AdminMenu $adminMenuWidget */
        $adminMenuWidget = $event->sender;

        $adminMenuWidget->addEntry(new MenuLink([
            'label' => Yii::t('ExampleBasicModule.base', 'Example'),
            'url' => ['/example-basic/admin'],
            'icon' => 'info-circle',
            'sortOrder' => 1000,
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'example-basic' && Yii::$app->controller->id == 'admin'),
            'isVisible' => Yii::$app->user->can(ManageModules::class)
        ]));
    }
}
