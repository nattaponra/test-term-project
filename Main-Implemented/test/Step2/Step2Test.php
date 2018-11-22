<?php



require_once __DIR__ . '/../../src/withdraw/Withdrawal.php';
require_once __DIR__ . '/../SECUTestCase.php';

final class Step2Test extends SECUTestCase
{

    function testWithdrawBalanceHasInsufficient()
    {

        //สร้าง User ที่มีเงิน 50,000
        $this->databaseTest()->createUser("8888888888", "8888", "TEST TEST", 500);

        try{
            //Driver Main เพื่อถอนเงิน 60,000
            $withdraw = new Withdrawal("8888888888");
            $result = $withdraw->withdraw(1000);

            //ตรวจสอบผล
            $this->assertEquals("ยอดเงินในบัญชีไม่เพียงพอ", $result["errorMessage"]);
        }finally{
            //ลบ user ที่สร้าง
           $this->databaseTest()->removeUser("8888888888", "8888");
        }

    }


    function testWithdrawComplete()
    {
        $this->assertTrue(true);
    }
}
