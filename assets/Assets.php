<?php

namespace acmeCorp\humhub\modules\exampleBasic\assets;

use humhub\components\assets\AssetBundle;

class Assets extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@example-basic/resources';

    /**
     * @inheritdoc
     */
    // TIP: Change forceCopy to true when testing your js in order to rebuild
    // this assets on every request (otherwise they will be cached)
    public $forceCopy = false;

    /**
     * @inheritdoc
     */
    public $js = [
        'js/humhub.example-basic.js',
    ];

}
