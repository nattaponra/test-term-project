<?php



require_once __DIR__ . '/../../src/withdraw/Withdrawal.php';
require_once __DIR__ . '/../SECUTestCase.php';

final class Step2Test extends SECUTestCase
{

    function testWD01WithdrawComplete_w10000_b20000_Remian10000()
    {

        //สร้าง User
        $this->databaseTest()->createUser("9988776655", "3323", "Withdrawal TEst", 20000);

        try{
            //Driver Main เพื่อถอนเงิน
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(10000);

            //ตรวจสอบผล
            $this->assertEquals(10000, $result["accountBalance"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD02WithdrawComplete_w1_b5_Remain4()
    {

        //สร้าง User
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 5);

        try{
            //Driver Main เพื่อถอนเงิน
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(1);

            //ตรวจสอบผล
            $this->assertEquals(4, $result["accountBalance"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD03WithdrawComplete_w20000_b20500_Remian500()
    {

        //สร้าง User
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 20500);

        try{
            //Driver Main เพื่อถอนเงิน
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(20000);

            //ตรวจสอบผล
            $this->assertEquals(500, $result["accountBalance"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD04WithdrawnotComplete_w20001_b20002_Notallowtowithdraw()
    {


        //สร้าง User
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 20002);

        try{
            //Driver Main เพื่อถอนเงิน
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(20001);

            //ตรวจสอบผล
            $this->assertEquals("จำนวนเงินต้องไม่เกิน 20,000 บาท", $result["errorMessage"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD05WithdrawnotComplete_w0_b5_Notallowtowithdraw()
    {


        //สร้าง User
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 5);

        try{
            //Driver Main เพื่อถอนเงิน
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(0);

            //ตรวจสอบผล
            $this->assertEquals("จำนวนเงินต้องไม่น้อยกว่า 1 บาท", $result["errorMessage"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD06WithdrawComplete_w10000_b10000_Remian0()
    {

        //สร้าง User
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 10000);

        try{
            //Driver Main เพื่อถอนเงิน
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(10000);

            //ตรวจสอบผล
            $this->assertEquals(0, $result["accountBalance"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD07WithdrawComplete_w1_b1_Remian0()
    {

        //สร้าง User
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 1);

        try{
            //Driver Main เพื่อถอนเงิน
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(1);

            //ตรวจสอบผล
            $this->assertEquals(0, $result["accountBalance"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD08WithdrawComplete_w20000_b20000_Remian0()
    {

        //สร้าง User
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 20000);

        try{
            //Driver Main เพื่อถอนเงิน
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(20000);

            //ตรวจสอบผล
            $this->assertEquals(0, $result["accountBalance"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD09WithdrawnotComplete_w20001_b20001_Notallowtowithdraw()
    {

        //สร้าง User
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 20001);

        try{
            //Driver Main เพื่อถอนเงิน
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(20001);

            //ตรวจสอบผล
            $this->assertEquals("จำนวนเงินต้องไม่เกิน 20,000 บาท", $result["errorMessage"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD10WithdrawnotComplete_w0_b0_Notallowtowithdraw()
    {

        //สร้าง User
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 0);

        try{
            //Driver Main เพื่อถอนเงิน
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(0);

            //ตรวจสอบผล
            $this->assertEquals("จำนวนเงินต้องไม่น้อยกว่า 1 บาท", $result["errorMessage"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD11WithdrawnotComplete_w10000_b9999_Notallowtowithdraw()
    {

        //สร้าง User
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 9999);

        try{
            //Driver Main เพื่อถอนเงิน
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(10000);

            //ตรวจสอบผล
            $this->assertEquals("ยอดเงินในบัญชีไม่เพียงพอ", $result["errorMessage"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD12WithdrawnotComplete_w1_b05_Notallowtowithdraw()
    {

        //สร้าง User
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 0);

        try{
            //Driver Main เพื่อถอนเงิน
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(1);

            //ตรวจสอบผล
            $this->assertEquals("ยอดเงินในบัญชีไม่เพียงพอ", $result["errorMessage"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD13WithdrawnotComplete_w20000_b19999_Notallowtowithdraw()
    {

        //สร้าง User
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 19999);

        try{
            //Driver Main เพื่อถอนเงิน
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(20000);

            //ตรวจสอบผล
            $this->assertEquals("ยอดเงินในบัญชีไม่เพียงพอ", $result["errorMessage"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD14WithdrawnotComplete_w20001_b20000_Notallowtowithdraw()
    {

        //สร้าง User
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 20000);

        try{
            //Driver Main เพื่อถอนเงิน
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(20001);

            //ตรวจสอบผล
            $this->assertEquals("จำนวนเงินต้องไม่เกิน 20,000 บาท", $result["errorMessage"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD15WithdrawnotComplete_w20k_b20000_Notallowtowithdraw()
    {

        //สร้าง User
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 20000);

        try{
            //Driver Main เพื่อถอนเงิน
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw('20k');

            //ตรวจสอบผล
            $this->assertEquals("จำนวนเงินต้องเป็นตัวเลขเท่านั้น", $result["errorMessage"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD16WithdrawnotComplete_w2000dot5_b20000_Notallowtowithdraw()
    {
        //สร้าง User
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 20000);

        try{
            //Driver Main เพื่อถอนเงิน
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(2000.5);

            //ตรวจสอบผล
            $this->assertEquals("จำนวนเงินต้องเป็นตัวเลขเท่านั้น", $result["errorMessage"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD17WithdrawnotComplete_w2000dot0_b20000_Notallowtowithdraw()
    {
        //สร้าง User
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 20000);

        try{
            //Driver Main เพื่อถอนเงิน
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(2000.0);

            //ตรวจสอบผล
            $this->assertEquals("จำนวนเงินต้องเป็นตัวเลขเท่านั้น", $result["errorMessage"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD18AccountNotFound()
    {
        $withdraw = new Withdrawal("0000000000");
        $result = $withdraw->withdraw(2000);

        //ตรวจสอบผล
        $this->assertEquals('Account number : 0000000000 not found.', $result["errorMessage"]);
    }

    function testWD19AccountLengthNot10()
    {
        $withdraw = new Withdrawal("000000000");
        $result = $withdraw->withdraw(2000);

        //ตรวจสอบผล
        $this->assertEquals('หมายเลขบัญชีต้องเป็นตัวเลข 10 หลัก', $result["errorMessage"]);
    }

    function testWD20AccountWithChar()
    {
        $withdraw = new Withdrawal("a000000000");
        $result = $withdraw->withdraw(2000);

        //ตรวจสอบผล
        $this->assertEquals('หมายเลขบัญชีต้องเป็นตัวเลข 10 หลัก', $result["errorMessage"]);
    }
    function testWD21AccountDecimalNum()
    {
        $withdraw = new Withdrawal("1.11111111");
        $result = $withdraw->withdraw(2000);

        //ตรวจสอบผล
        $this->assertEquals('หมายเลขบัญชีต้องเป็นตัวเลข 10 หลัก', $result["errorMessage"]);
    }
}
