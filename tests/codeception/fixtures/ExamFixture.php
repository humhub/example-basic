<?php
/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2021 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace acmeCorp\humhub\modules\exampleBasic\tests\codeception\fixtures;

use humhub\modules\post\models\Post;
use yii\test\ActiveFixture;

class ExamFixture extends ActiveFixture
{
    public $modelClass = Post::class; // <-- change me to model

    public $dataFile = '@example-basic/tests/codeception/fixtures/data/exam.php';
    public $depends = [
        //'acmeCorp\humhub\modules\exampleBasic\tests\codeception\fixtures\ExamReadFixture',
    ];
}
