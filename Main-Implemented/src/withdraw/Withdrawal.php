<?php

require_once __DIR__."/../serviceauthentication/serviceauthentication.php";
require_once __DIR__."/../serviceauthentication/DBConnection.php";

class Withdrawal
{
    private $acctNum;
    public function __construct($session)
    {
        $this->acctNum = $session;
    }

    public function getAccountAuthenticationProvider(){
        return ServiceAuthentication::accountAuthenticationProvider($this->acctNum);

    }

    public function withdraw($amount):array
    {
        $result = array("accountNumber" => '',"accountName" => '' ,"accountBalance" => '',"errorMessage" => '');
        if(is_numeric($amount))
        {
            if($amount > 20000)
            {
                $result["errorMessage"] = "จำนวนเงินต้องไม่เกิน 20,000 บาท";
                return $result;
            }elseif($amount < 1)
            {
                $result["errorMessage"] = "จำนวนเงินต้องไม่น้อยกว่า 1 บาท";
                return $result;
            }
        }else
        {
            $result["errorMessage"] = "จำนวนเงินต้องเป็นตัวเลขเท่านั้น";
            return $result;
        }
        if(strlen(strlen($this->acctNum) == 10))
        {
            if(is_numeric($this->acctNum))
            {
               try
               {
                    $result_AccountAuthen = $this->getAccountAuthenticationProvider();
                    $amount_balance = $result_AccountAuthen["accBalance"];
                    if($amount_balance >= $amount)
                    {
                        $amount_balance = $amount_balance - $amount;
                        if(DBConnection::saveTransaction($this->acctNum,$amount_balance))
                        {
                            $result["accountNumber"] = $result_AccountAuthen["accNo"];
                            $result["accountName"] = $result_AccountAuthen["accName"];
                            $result["accountBalance"] = $amount_balance;
                        }else
                        {
                            $result["errorMessage"] = "ระบบขัดข้อง ไม่สามารถถอนเงินได้";
                            return $result;
                        }
                    }else
                    {
                        $result["errorMessage"] = "ยอดเงินในบัญชีไม่เพียงพอ";
                        return $result;
                    }
               }catch(AccountInformationException $e)
               {
                   $result["errorMessage"] = $e->getMessage();
                   return $result;
               }
            }else
            {
                $result["errorMessage"] = "หมายเลขบัญชีต้องเป็นตัวเลขเท่านั้น";
                return $result;
            }
        }else
        {
            $result["errorMessage"]= "หมายเลขบัญชีต้องมีจำนวนทั้งหมด 10 หลัก";
            return $result;
        }
        return $result;
    }
}