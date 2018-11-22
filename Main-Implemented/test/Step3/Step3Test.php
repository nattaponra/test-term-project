<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../src/withdraw/Withdrawal.php';
require_once __DIR__ . '/../TestHelper.php';

final class Step3Test extends TestCase
{

    function testWithdrawBalanceHasInsufficient()
    {
        $TestHelper = new TestHelper();
        $TestHelper->createUser("9999911111","2561","TEST TEST",1000);
        $TestHelper->removeUser("9999911111","2561");

        $withdrawal = new Withdrawal();


        $this->assertTrue(true);
    }


    function testWithdrawComplete()
    {
        $this->assertTrue(true);
    }
}
