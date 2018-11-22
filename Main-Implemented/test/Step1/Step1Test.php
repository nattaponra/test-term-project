<?php

require_once __DIR__ . '/../SECUTestCase.php';
require_once __DIR__ . '/../../src/withdraw/Withdrawal.php';

final class Step1Test extends SECUTestCase
{

    function testWithdrawBalanceHasInsufficient()
    {
        $withdraw = $this->getMockBuilder(Withdrawal::class)
            ->setConstructorArgs(["1234567890"])
            ->setMethods(['getAccountAuthenticationProvider','saveTransaction'])
            ->getMock();

        //Stub AccountAuthenticationProvider
        $withdraw->method('getAccountAuthenticationProvider')
            ->willReturn([
                "accNo" => "1234567890",
                "accName" => "XXXXX  YYYYY",
                "accBalance" => 100
            ]);

        //Stub saveTransaction
        $withdraw->method('saveTransaction')->willReturn(false);



        $result = $withdraw->withdraw(200);
        $this->assertEquals("ยอดเงินในบัญชีไม่เพียงพอ", $result["errorMessage"]);


    }


    function testWithdrawComplete()
    {
        $withdraw = $this->getMockBuilder(Withdrawal::class)
            ->setConstructorArgs(["1234567890"])
            ->setMethods(['getAccountAuthenticationProvider','saveTransaction'])
            ->getMock();

        $withdraw->method('getAccountAuthenticationProvider')
            ->willReturn([
                "accNo" => "1234567890",
                "accName" => "XXXXX  YYYYY",
                "accBalance" => 200
            ]);

        //Stub saveTransaction
        $withdraw->method('saveTransaction')->willReturn(true);


        $result = $withdraw->withdraw(200);
        $this->assertEquals(0, $result["accountBalance"]);

    }
}
