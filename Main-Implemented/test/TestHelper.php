<?php
require_once __DIR__ . '/../src/serviceauthentication/DBConnection.php';

class TestHelper extends DBConnection
{
    function createUser($accNum, $pin, $name, $balance = 0, $waterCharge = 0, $electricCharge = 0, $phoneCharge = 0)
    {
        $con = DBConnection::getInstance();

        $stmt = $con->prepare("TRUNCATE ACCOUNT");
        $stmt->execute();

        $stmt = $con->prepare(
            "INSERT INTO `ACCOUNT` (`no`, `pin`, `name`, `balance`, `waterCharge`, `electricCharge`, `phoneCharge`) VALUES
            ('$accNum', '$pin', '$name', $balance, $waterCharge, $electricCharge, $phoneCharge)"
        );
        $stmt->execute();
    }
}