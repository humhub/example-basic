<?php

use humhubContrib\modules\exampleBasic\Events;
use humhub\modules\admin\widgets\AdminMenu;
use humhub\widgets\TopMenu;

return [
    'id' => 'example-basic',
    'class' => 'humhubContrib\modules\exampleBasic\Module',
    'namespace' => 'humhubContrib\modules\exampleBasic',
    'events' => [
        [TopMenu::class, TopMenu::EVENT_INIT, [Events::class, 'onTopMenuInit']],
        [AdminMenu::class, AdminMenu::EVENT_INIT, [Events::class, 'onAdminMenuInit']]
    ],
];
