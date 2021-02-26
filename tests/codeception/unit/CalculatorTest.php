<?php

namespace acmeCorp\humhub\modules\exampleBasic\codeceptionTest;

use tests\codeception\_support\HumHubDbTestCase;

class CalculatorTest extends HumHubDbTestCase
{
    public function testAddition()
    {
        $this->assertTrue((1 + 1 === 2));
        $this->assertTrue((2 !== 3));
    }

}