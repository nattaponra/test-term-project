<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../src/withdraw/Withdrawal.php';

final class Step1Test extends TestCase
{

    function testWithdrawBalanceHasInsufficient()
    {
        $withdraw = $this->getMockBuilder(Withdrawal::class)
            ->setConstructorArgs(["1234567890"])
            ->setMethods(['getAccountAuthenticationProvider'])
            ->getMock();

        $withdraw->method('getAccountAuthenticationProvider')
            ->willReturn([
                "accNo" => "1234567890",
                "accName" => "XXXXX  YYYYY",
                "accBalance" => 100
            ]);
        $result = $withdraw->withdraw(200);
        $this->assertEquals("ยอดเงินในบัญชีไม่เพียงพอ",$result["errorMessage"]);


    }


    function testWithdrawComplete()
    {
        $withdraw = $this->getMockBuilder(Withdrawal::class)
            ->setConstructorArgs(["1234567890"])
            ->setMethods(['getAccountAuthenticationProvider'])
            ->getMock();

        $withdraw->method('getAccountAuthenticationProvider')
            ->willReturn([
                "accNo" => "1234567890",
                "accName" => "XXXXX  YYYYY",
                "accBalance" => 200
            ]);
        $result = $withdraw->withdraw(200);
        $this->assertEquals(0,$result["accountBalance"]);

    }
}
