<?php

namespace acmeCorp\humhub\modules\exampleBasic\codeceptionTest\acceptance;

use acmeCorp\humhub\modules\exampleBasic\codeceptionTest\AcceptanceTester;

class AdminAreaCest
{

    public function testAdminInfoPage(AcceptanceTester $I)
    {
        $I->wantTo('see admin info page');
        $I->amAdmin();
        $I->amOnRoute(['/example-basic/admin/index']);
        $I->waitForText('Welcome to the admin only area.');
    }

}
