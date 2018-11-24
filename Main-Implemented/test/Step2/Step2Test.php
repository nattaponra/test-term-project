<?php



require_once __DIR__ . '/../../src/withdraw/Withdrawal.php';
require_once __DIR__ . '/../SECUTestCase.php';

final class Step2Test extends SECUTestCase
{

    function testWD01WithdrawComplete_x10000_y20000_Remian10000()
    {

        //สร้าง User ที่มีเงิน 50,000
        $this->databaseTest()->createUser("9988776655", "3323", "Withdrawal TEst", 20000);

        try{
            //Driver Main เพื่อถอนเงิน 60,000
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(10000);

            //ตรวจสอบผล
            $this->assertEquals(10000, $result["accountBalance"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD02WithdrawComplete_x1_y5_Remain4()
    {

        //สร้าง User ที่มีเงิน 50,000
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 5);

        try{
            //Driver Main เพื่อถอนเงิน 60,000
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(1);

            //ตรวจสอบผล
            $this->assertEquals(4, $result["accountBalance"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD03WithdrawComplete_x20000_y20500_Remian500()
    {

        //สร้าง User ที่มีเงิน 50,000
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 20500);

        try{
            //Driver Main เพื่อถอนเงิน 60,000
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(20000);

            //ตรวจสอบผล
            $this->assertEquals(500, $result["accountBalance"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD04WithdrawnotComplete_x20001_y20002_Notallowtowithdraw()
    {


        //สร้าง User ที่มีเงิน 50,000
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 20002);

        try{
            //Driver Main เพื่อถอนเงิน 60,000
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(20001);

            //ตรวจสอบผล
            $this->assertEquals("จำนวนเงินต้องไม่เกิน 20,000 บาท", $result["errorMessage"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD05WithdrawnotComplete_x0_y5_Notallowtowithdraw()
    {


        //สร้าง User ที่มีเงิน 50,000
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 5);

        try{
            //Driver Main เพื่อถอนเงิน 60,000
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(0);

            //ตรวจสอบผล
            $this->assertEquals("จำนวนเงินต้องไม่น้อยกว่า 1 บาท", $result["errorMessage"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD06WithdrawComplete_x10000_y10000_0()
    {

        //สร้าง User ที่มีเงิน 50,000
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 10000);

        try{
            //Driver Main เพื่อถอนเงิน 60,000
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(10000);

            //ตรวจสอบผล
            $this->assertEquals(0, $result["accountBalance"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD07WithdrawComplete_x1_y1_0()
    {

        //สร้าง User ที่มีเงิน 50,000
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 1);

        try{
            //Driver Main เพื่อถอนเงิน 60,000
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(1);

            //ตรวจสอบผล
            $this->assertEquals(0, $result["accountBalance"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD08WithdrawComplete_x20000_y20000_0()
    {

        //สร้าง User ที่มีเงิน 50,000
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 20000);

        try{
            //Driver Main เพื่อถอนเงิน 60,000
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(20000);

            //ตรวจสอบผล
            $this->assertEquals(0, $result["accountBalance"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD09WithdrawnotComplete_x20001_y20001_Notallowtowithdraw()
    {

        //สร้าง User ที่มีเงิน 50,000
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 20001);

        try{
            //Driver Main เพื่อถอนเงิน 60,000
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(20001);

            //ตรวจสอบผล
            $this->assertEquals("จำนวนเงินต้องไม่เกิน 20,000 บาท", $result["errorMessage"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD10WithdrawnotComplete_x0_y0_Notallowtowithdraw()
    {

        //สร้าง User ที่มีเงิน 50,000
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 0);

        try{
            //Driver Main เพื่อถอนเงิน 60,000
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(0);

            //ตรวจสอบผล
            $this->assertEquals("จำนวนเงินต้องไม่น้อยกว่า 1 บาท", $result["errorMessage"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD11WithdrawnotComplete_x10000_y9999_Notallowtowithdraw()
    {

        //สร้าง User ที่มีเงิน 50,000
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 9999);

        try{
            //Driver Main เพื่อถอนเงิน 60,000
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(10000);

            //ตรวจสอบผล
            $this->assertEquals("ยอดเงินในบัญชีไม่เพียงพอ", $result["errorMessage"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD12WithdrawnotComplete_x1_y05_Notallowtowithdraw()
    {

        //สร้าง User ที่มีเงิน 50,000
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 0.5);

        try{
            //Driver Main เพื่อถอนเงิน 60,000
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(1);

            //ตรวจสอบผล
            $this->assertEquals("ยอดเงินในบัญชีไม่เพียงพอ", $result["errorMessage"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD13WithdrawnotComplete_x20000_y19999_Notallowtowithdraw()
    {

        //สร้าง User ที่มีเงิน 50,000
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 19999);

        try{
            //Driver Main เพื่อถอนเงิน 60,000
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(20000);

            //ตรวจสอบผล
            $this->assertEquals("ยอดเงินในบัญชีไม่เพียงพอ", $result["errorMessage"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD14WithdrawnotComplete_x20001_y20000_Notallowtowithdraw()
    {

        //สร้าง User ที่มีเงิน 50,000
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 20000);

        try{
            //Driver Main เพื่อถอนเงิน 60,000
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(20001);

            //ตรวจสอบผล
            $this->assertEquals("จำนวนเงินต้องไม่เกิน 20,000 บาท", $result["errorMessage"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD15WithdrawnotComplete_x05_y0_Notallowtowithdraw()
    {

        //สร้าง User ที่มีเงิน 50,000
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 0);

        try{
            //Driver Main เพื่อถอนเงิน 60,000
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(0.5);

            //ตรวจสอบผล
            $this->assertEquals("จำนวนเงินต้องไม่น้อยกว่า 1 บาท", $result["errorMessage"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD16WithdrawnotComplete_x200k_y35000_Notallowtowithdraw()
    {

        //สร้าง User ที่มีเงิน 50,000
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 35000);

        try{
            //Driver Main เพื่อถอนเงิน 60,000
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw('200k');

            //ตรวจสอบผล
            $this->assertEquals("จำนวนเงินต้องเป็นตัวเลขเท่านั้น", $result["errorMessage"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }

    function testWD17Withdraw_0_5_30500_error()
    {

        //สร้าง User ที่มีเงิน 50,000
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 30500);

        try{
            //Driver Main เพื่อถอนเงิน 60,000
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(0.5);

            //ตรวจสอบผล
            $this->assertEquals(30499.5, $result["accountBalance"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }
    }


    function testWD18Withdraw_0_5_30500_error()
    {

        //สร้าง User ที่มีเงิน 50,000
        $this->databaseTest()->createUser("9988776655", "3323", "TEST TEST", 30500);

        try{
            //Driver Main เพื่อถอนเงิน 60,000
            $withdraw = new Withdrawal("9988776655");
            $result = $withdraw->withdraw(0.5);

            //ตรวจสอบผล
            $this->assertEquals(30499.5, $result["errorMessage"]);
        }finally{
            //ลบ user ที่สร้าง
            $this->databaseTest()->removeUser("9988776655", "3323");
        }

    }
}
