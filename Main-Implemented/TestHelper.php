<?php
require_once __DIR__ . '/../src/serviceauthentication/DBConnection.php';

class TestHelper extends DBConnection
{


    /**
     * สร้าง user ใน database
     * @param $accNum
     * @param $pin
     * @param $name
     * @param int $balance
     * @param int $waterCharge
     * @param int $electricCharge
     * @param int $phoneCharge
     */
    function createUser($accNum, $pin, $name, $balance = 0, $waterCharge = 0, $electricCharge = 0, $phoneCharge = 0)
    {
        $con = DBConnection::getInstance();
        $stmt = $con->prepare(
            "INSERT INTO `ACCOUNT` (`no`, `pin`, `name`, `balance`, `waterCharge`, `electricCharge`, `phoneCharge`) VALUES
            ('$accNum', '$pin', '$name', $balance, $waterCharge, $electricCharge, $phoneCharge)"
        );
        $stmt->execute();
    }

    /**
     * ลบ user ใน database
     * @param $accNum
     * @param $pin
     */
    function removeUser($accNum, $pin)
    {
        $con = DBConnection::getInstance();
        $stmt = $con->prepare(
            "DELETE FROM `ACCOUNT` WHERE no='$accNum' AND pin='$pin'"
        );
        $stmt->execute();
    }
}