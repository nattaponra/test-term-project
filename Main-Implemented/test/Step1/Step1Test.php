<?php

require_once __DIR__ . '/../SECUTestCase.php';
require_once __DIR__ . '/../../src/withdraw/Withdrawal.php';

final class Step1Test extends SECUTestCase
{

    function testWD01WithdrawComplete_x10000_y20000_Remian10000()
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

    function testWD02WithdrawComplete_x1_y5_Remain4()
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

    function testWD03WithdrawComplete_x20000_y20500_Remian500()
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
    function testWD04WithdrawnotComplete_x20001_y20002_Notallowtowithdraw()
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
    function testWD05WithdrawnotComplete_x0_y5_Notallowtowithdraw()
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
    function testWD06WithdrawComplete_x10000_y10000_0()
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
    function testWD07WithdrawComplete_x1_y1_0()
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
    function testWD08WithdrawComplete_x20000_y20000_0()
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
    function testWD09WithdrawnotComplete_x20001_y20001_Notallowtowithdraw()
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
    function testWD10WithdrawnotComplete_x0_y0_Notallowtowithdraw()
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
    function testWD11WithdrawnotComplete_x10000_y9999_Notallowtowithdraw()
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
    function testWD12WithdrawnotComplete_x1_y05_Notallowtowithdraw()
    {
        $withdraw = $this->getMockBuilder(Withdrawal::class)
            ->setConstructorArgs(["1234567890"])
            ->setMethods(['getAccountAuthenticationProvider','saveTransaction'])
            ->getMock();

        $withdraw->method('getAccountAuthenticationProvider')
            ->willReturn([
                "accNo" => "1234567890",
                "accName" => "XXXXX  YYYYY",
                "accBalance" => 0.5
            ]);

        //Stub saveTransaction
        $withdraw->method('saveTransaction')->willReturn(true);


        $result = $withdraw->withdraw(1);
        $this->assertEquals(ยอดเงินในบัญชีไม่เพียงพอ, $result["errorMessage"]);
    }
    function testWD13WithdrawnotComplete_x20000_y19999_Notallowtowithdraw()
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
    function testWD14WithdrawnotComplete_x20001_y20000_Notallowtowithdraw()
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
    function testWD15WithdrawnotComplete_x05_y0_Notallowtowithdraw()
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


        $result = $withdraw->withdraw(0.5);
        $this->assertEquals('จำนวนเงินต้องไม่น้อยกว่า 1 บาท', $result["errorMessage"]);
    }
    function testWD16WithdrawnotComplete_x200l_y35000_Notallowtowithdraw()
    {
        $withdraw = $this->getMockBuilder(Withdrawal::class)
            ->setConstructorArgs(["1234567890"])
            ->setMethods(['getAccountAuthenticationProvider','saveTransaction'])
            ->getMock();

        $withdraw->method('getAccountAuthenticationProvider')
            ->willReturn([
                "accNo" => "1234567890",
                "accName" => "XXXXX  YYYYY",
                "accBalance" => 35000
            ]);

        //Stub saveTransaction
        $withdraw->method('saveTransaction')->willReturn(true);


        $result = $withdraw->withdraw('200k');
        $this->assertEquals('จำนวนเงินต้องเป็นตัวเลขเท่านั้น', $result["errorMessage"]);
    }
    function testWD17Withdraw_0_5_30500_error()
    {
        $withdraw = $this->getMockBuilder(Withdrawal::class)
            ->setConstructorArgs(["1234567890"])
            ->setMethods(['getAccountAuthenticationProvider','saveTransaction'])
            ->getMock();

        $withdraw->method('getAccountAuthenticationProvider')
            ->willReturn([
                "accNo" => "1234567890",
                "accName" => "XXXXX  YYYYY",
                "accBalance" => 30500
            ]);

        //Stub saveTransaction
        $withdraw->method('saveTransaction')->willReturn(true);


        $result = $withdraw->withdraw(105.5);
        $this->assertEquals(33904.5, $result["accountBalance"]);
    }

    function testWD18Withdraw_0_5_30500_error()
    {
        $withdraw = $this->getMockBuilder(Withdrawal::class)
            ->setConstructorArgs(["1234567890"])
            ->setMethods(['getAccountAuthenticationProvider','saveTransaction'])
            ->getMock();

        $withdraw->method('getAccountAuthenticationProvider')
            ->willReturn([
                "accNo" => "1234567890",
                "accName" => "XXXXX  YYYYY",
                "accBalance" => 30500
            ]);

        //Stub saveTransaction
        $withdraw->method('saveTransaction')->willReturn(true);


        $result = $withdraw->withdraw(105.5);
        $this->assertEquals(33904.5, $result["errorMessage"]);
    }
}
