<?php

require_once "serviceauthentication/serviceauthentication.php";
require_once "serviceauthentication/DBConnection.php";

class Withdrawal
{
    private $acctNum;
    public function __construct($session)
    {
        $this->acctNum = $session;
    }

    public function withdraw($amount):array
    {
        $result = array("accountNumber" => '',"accountName" => '' ,"accountBalance" => '',"errorMessage" => '');
        if(is_numeric($amount))
        {
            if(strlen(strlen($this->acctNum) == 10))
            {
                if(is_numeric($this->acctNum))
                {
                   try
                   {
                       $result_AccountAuthen = ServiceAuthentication::accountAuthenticationProvider($this->acctNum);
                       $amount_balance = $result_AccountAuthen["accBalance"];
                        if($amount_balance >= $amount)
                        {
                            $amount_balance = $amount_balance - $amount;
                            if(DBConnection::saveTransaction($this->acctNum,$amount_balance))
                            {
                                $result["accountNumber"] = $result_AccountAuthen["accNo"];
                                $result["accountName"] = $result_AccountAuthen["accName"];
                                $result["accountBalance"] = $amount_balance ;
                            }else
                            {
                                $result["errorMessage"] = "ระบบขัดข้อง ไม่สามารถถอนเงินได้";
                            }
                        }else
                        {
                            $result["errorMessage"] = "ยอดเงินในบัญชีไม่เพียงพอ";
                        }
                   }catch(AccountInformationException $e)
                   {
                       $result["errorMessage"] = $e->getMessage();
                   }
                }else
                {
                    $result["errorMessage"] = "หมายเลขบัญชีต้องเป็นตัวเลขเท่านั้น";
                }
            }else
            {
                $result["errorMessage"]= "หมายเลขบัญชีต้องมีจำนวนทั้งหมด10หลัก";
            }
        }else
        {
            $result["errorMessage"] = "จำนวนเงินต้องเป็นตัวเลขเท่านั้น";
        }
        return $result;
    }
}