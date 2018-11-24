<?php
require_once __DIR__ . '/../src/serviceauthentication/DBConnection.php';

class TestHelper extends DBConnection
{

    public function __construct()
    {

        DBConnection::$dsn = $_ENV["dsn"];
        DBConnection::$user = $_ENV["user"];
        DBConnection::$pass = $_ENV["pass"];

        $this->createDB();
    }


    function createDB()
    {
        $con = DBConnection::getInstance();

        $stmt = $con->prepare("SHOW TABLES LIKE 'ACCOUNT'");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (empty($result)) {
            $stmt = $con->prepare(
             "
            /*!40101 SET @saved_cs_client     = @@character_set_client */;
            /*!40101 SET character_set_client = utf8 */;
            CREATE TABLE `ACCOUNT` (
              `no` char(10) COLLATE utf8_unicode_ci NOT NULL,
              `pin` char(4) COLLATE utf8_unicode_ci NOT NULL,
              `name` char(50) COLLATE utf8_unicode_ci NOT NULL,
              `balance` int(11) NOT NULL,
              `waterCharge` int(11) NOT NULL,
              `electricCharge` int(11) NOT NULL,
              `phoneCharge` int(11) NOT NULL,
              PRIMARY KEY (`no`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;"
            );
            $stmt->execute();
        }

    }

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