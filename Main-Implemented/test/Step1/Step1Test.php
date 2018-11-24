<?php

require_once __DIR__ . '/../SECUTestCase.php';
require_once __DIR__ . '/../../src/withdraw/Withdrawal.php';

final class Step1Test extends SECUTestCase
{

    function testWD01WithdrawComplete_w10000_b20000_Remian10000()
    {
        $withdraw = $this->getMockBuilder(Withdrawal::class)
            ->setConstructorArgs(["1234567890"])
            ->setMethods(['getAccountAuthenticationProvider','saveTransaction'])
            ->getMock();

        $withdraw->method('getAccountAuthenticationProvider')
            ->willReturn([
                "accNo" => "1234567890",
                "accName" => "XXXXX  YYYYY",
                "accBalance" => 20000
            ]);

        //Stub saveTransaction
        $withdraw->method('saveTransaction')->willReturn(true);


        $result = $withdraw->withdraw(10000);
        $this->assertEquals(10000, $result["accountBalance"]);
    }

    function testWD02WithdrawComplete_w1_b5_Remain4()
    {
        $withdraw = $this->getMockBuilder(Withdrawal::class)
            ->setConstructorArgs(["1234567890"])
            ->setMethods(['getAccountAuthenticationProvider','saveTransaction'])
            ->getMock();

        $withdraw->method('getAccountAuthenticationProvider')
            ->willReturn([
                "accNo" => "1234567890",
                "accName" => "XXXXX  YYYYY",
                "accBalance" => 5
            ]);

        //Stub saveTransaction
        $withdraw->method('saveTransaction')->willReturn(true);


        $result = $withdraw->withdraw(1);
        $this->assertEquals(4, $result["accountBalance"]);
    }

    function testWD03WithdrawComplete_w20000_b20500_Remian500()
    {
        $withdraw = $this->getMockBuilder(Withdrawal::class)
            ->setConstructorArgs(["1234567890"])
            ->setMethods(['getAccountAuthenticationProvider','saveTransaction'])
            ->getMock();

        $withdraw->method('getAccountAuthenticationProvider')
            ->willReturn([
                "accNo" => "1234567890",
                "accName" => "XXXXX  YYYYY",
                "accBalance" => 20500
            ]);

        //Stub saveTransaction
        $withdraw->method('saveTransaction')->willReturn(true);


        $result = $withdraw->withdraw(20000);
        $this->assertEquals(500, $result["accountBalance"]);
    }
    function testWD04WithdrawnotComplete_w20001_b20002_Notallowtowithdraw()
    {
        $withdraw = $this->getMockBuilder(Withdrawal::class)
            ->setConstructorArgs(["1234567890"])
            ->setMethods(['getAccountAuthenticationProvider','saveTransaction'])
            ->getMock();

        $withdraw->method('getAccountAuthenticationProvider')
            ->willReturn([
                "accNo" => "1234567890",
                "accName" => "XXXXX  YYYYY",
                "accBalance" => 20002
            ]);

        //Stub saveTransaction
        $withdraw->method('saveTransaction')->willReturn(true);


        $result = $withdraw->withdraw(20001);
        $this->assertEquals('จำนวนเงินต้องไม่เกิน 20,000 บาท', $result["errorMessage"]);
    }
    function testWD05WithdrawnotComplete_w0_b5_Notallowtowithdraw()
    {
        $withdraw = $this->getMockBuilder(Withdrawal::class)
            ->setConstructorArgs(["1234567890"])
            ->setMethods(['getAccountAuthenticationProvider','saveTransaction'])
            ->getMock();

        $withdraw->method('getAccountAuthenticationProvider')
            ->willReturn([
                "accNo" => "1234567890",
                "accName" => "XXXXX  YYYYY",
                "accBalance" => 5
            ]);

        //Stub saveTransaction
        $withdraw->method('saveTransaction')->willReturn(true);


        $result = $withdraw->withdraw(0);
        $this->assertEquals('จำนวนเงินต้องไม่น้อยกว่า 1 บาท', $result["errorMessage"]);
    }
    function testWD06WithdrawComplete_w10000_b10000_Remian0()
    {
        $withdraw = $this->getMockBuilder(Withdrawal::class)
            ->setConstructorArgs(["1234567890"])
            ->setMethods(['getAccountAuthenticationProvider','saveTransaction'])
            ->getMock();

        $withdraw->method('getAccountAuthenticationProvider')
            ->willReturn([
                "accNo" => "1234567890",
                "accName" => "XXXXX  YYYYY",
                "accBalance" => 10000
            ]);

        //Stub saveTransaction
        $withdraw->method('saveTransaction')->willReturn(true);


        $result = $withdraw->withdraw(10000);
        $this->assertEquals(0, $result["accountBalance"]);
    }
    function testWD07WithdrawComplete_w1_b1_Remian0()
    {
        $withdraw = $this->getMockBuilder(Withdrawal::class)
            ->setConstructorArgs(["1234567890"])
            ->setMethods(['getAccountAuthenticationProvider','saveTransaction'])
            ->getMock();

        $withdraw->method('getAccountAuthenticationProvider')
            ->willReturn([
                "accNo" => "1234567890",
                "accName" => "XXXXX  YYYYY",
                "accBalance" => 1
            ]);

        //Stub saveTransaction
        $withdraw->method('saveTransaction')->willReturn(true);


        $result = $withdraw->withdraw(1);
        $this->assertEquals(0, $result["accountBalance"]);
    }
    function testWD08WithdrawComplete_w20000_b20000_Remian0()
    {
        $withdraw = $this->getMockBuilder(Withdrawal::class)
            ->setConstructorArgs(["1234567890"])
            ->setMethods(['getAccountAuthenticationProvider','saveTransaction'])
            ->getMock();

        $withdraw->method('getAccountAuthenticationProvider')
            ->willReturn([
                "accNo" => "1234567890",
                "accName" => "XXXXX  YYYYY",
                "accBalance" => 20000
            ]);

        //Stub saveTransaction
        $withdraw->method('saveTransaction')->willReturn(true);


        $result = $withdraw->withdraw(20000);
        $this->assertEquals(0, $result["accountBalance"]);
    }
    function testWD09WithdrawnotComplete_w20001_b20001_Notallowtowithdraw()
    {
        $withdraw = $this->getMockBuilder(Withdrawal::class)
            ->setConstructorArgs(["1234567890"])
            ->setMethods(['getAccountAuthenticationProvider','saveTransaction'])
            ->getMock();

        $withdraw->method('getAccountAuthenticationProvider')
            ->willReturn([
                "accNo" => "1234567890",
                "accName" => "XXXXX  YYYYY",
                "accBalance" => 20001
            ]);

        //Stub saveTransaction
        $withdraw->method('saveTransaction')->willReturn(true);


        $result = $withdraw->withdraw(20001);
        $this->assertEquals('จำนวนเงินต้องไม่เกิน 20,000 บาท', $result["errorMessage"]);
    }
    function testWD10WithdrawnotComplete_w0_b0_Notallowtowithdraw()
    {
        $withdraw = $this->getMockBuilder(Withdrawal::class)
            ->setConstructorArgs(["1234567890"])
            ->setMethods(['getAccountAuthenticationProvider','saveTransaction'])
            ->getMock();

        $withdraw->method('getAccountAuthenticationProvider')
            ->willReturn([
                "accNo" => "1234567890",
                "accName" => "XXXXX  YYYYY",
                "accBalance" => 0
            ]);

        //Stub saveTransaction
        $withdraw->method('saveTransaction')->willReturn(true);


        $result = $withdraw->withdraw(0);
        $this->assertEquals('จำนวนเงินต้องไม่น้อยกว่า 1 บาท', $result["errorMessage"]);
    }
    function testWD11WithdrawnotComplete_w10000_b9999_Notallowtowithdraw()
    {
        $withdraw = $this->getMockBuilder(Withdrawal::class)
            ->setConstructorArgs(["1234567890"])
            ->setMethods(['getAccountAuthenticationProvider','saveTransaction'])
            ->getMock();

        $withdraw->method('getAccountAuthenticationProvider')
            ->willReturn([
                "accNo" => "1234567890",
                "accName" => "XXXXX  YYYYY",
                "accBalance" => 9999
            ]);

        //Stub saveTransaction
        $withdraw->method('saveTransaction')->willReturn(true);


        $result = $withdraw->withdraw(10000);
        $this->assertEquals('ยอดเงินในบัญชีไม่เพียงพอ', $result["errorMessage"]);
    }
    function testWD12WithdrawnotComplete_w1_b0_Notallowtowithdraw()
    {
        $withdraw = $this->getMockBuilder(Withdrawal::class)
            ->setConstructorArgs(["1234567890"])
            ->setMethods(['getAccountAuthenticationProvider','saveTransaction'])
            ->getMock();

        $withdraw->method('getAccountAuthenticationProvider')
            ->willReturn([
                "accNo" => "1234567890",
                "accName" => "XXXXX  YYYYY",
                "accBalance" => 0
            ]);

        //Stub saveTransaction
        $withdraw->method('saveTransaction')->willReturn(true);


        $result = $withdraw->withdraw(1);
        $this->assertEquals(ยอดเงินในบัญชีไม่เพียงพอ, $result["errorMessage"]);
    }
    function testWD13WithdrawnotComplete_w20000_b19999_Notallowtowithdraw()
    {
        $withdraw = $this->getMockBuilder(Withdrawal::class)
            ->setConstructorArgs(["1234567890"])
            ->setMethods(['getAccountAuthenticationProvider','saveTransaction'])
            ->getMock();

        $withdraw->method('getAccountAuthenticationProvider')
            ->willReturn([
                "accNo" => "1234567890",
                "accName" => "XXXXX  YYYYY",
                "accBalance" => 19999
            ]);

        //Stub saveTransaction
        $withdraw->method('saveTransaction')->willReturn(true);


        $result = $withdraw->withdraw(20000);
        $this->assertEquals('ยอดเงินในบัญชีไม่เพียงพอ', $result["errorMessage"]);
    }
    function testWD14WithdrawnotComplete_w20001_b20000_Notallowtowithdraw()
    {
        $withdraw = $this->getMockBuilder(Withdrawal::class)
            ->setConstructorArgs(["1234567890"])
            ->setMethods(['getAccountAuthenticationProvider','saveTransaction'])
            ->getMock();

        $withdraw->method('getAccountAuthenticationProvider')
            ->willReturn([
                "accNo" => "1234567890",
                "accName" => "XXXXX  YYYYY",
                "accBalance" => 20000
            ]);

        //Stub saveTransaction
        $withdraw->method('saveTransaction')->willReturn(true);


        $result = $withdraw->withdraw(20001);
        $this->assertEquals('จำนวนเงินต้องไม่เกิน 20,000 บาท', $result["errorMessage"]);
    }
    function testWD15WithdrawnotComplete_w20k_b20000_Notallowtowithdraw()
    {
        $withdraw = $this->getMockBuilder(Withdrawal::class)
            ->setConstructorArgs(["1234567890"])
            ->setMethods(['getAccountAuthenticationProvider','saveTransaction'])
            ->getMock();

        $withdraw->method('getAccountAuthenticationProvider')
            ->willReturn([
                "accNo" => "1234567890",
                "accName" => "XXXXX  YYYYY",
                "accBalance" => 20000
            ]);

        //Stub saveTransaction
        $withdraw->method('saveTransaction')->willReturn(true);


        $result = $withdraw->withdraw('20k');
        $this->assertEquals('จำนวนเงินต้องเป็นตัวเลขเท่านั้น', $result["errorMessage"]);
    }
}
