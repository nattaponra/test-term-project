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

    public function saveTransaction($amountBalance){
      return  DBConnection::saveTransaction($this->acctNum,$amountBalance);
    }

    public function withdraw($amount):array
    {
        $result = array("accountNumber" => '',"accountName" => '' ,"accountBalance" => '',"errorMessage" => '');
        
        if(is_string($amount))
        {
            if(ctype_digit($amount))
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
        }elseif(is_int($amount))
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

        if(strlen($this->acctNum) == 10)
        {
            if(is_numeric($this->acctNum))
            {
               try
               {
                    $resultAccountAuthen = $this->getAccountAuthenticationProvider();
                    $amountBalance = $resultAccountAuthen["accBalance"];
                    if($amountBalance >= $amount)
                    {
                        $amountBalance = $amountBalance - $amount;
                        if($this->saveTransaction($amountBalance))
                        {
                            $result["accountNumber"] = $resultAccountAuthen["accNo"];
                            $result["accountName"] = $resultAccountAuthen["accName"];
                            $result["accountBalance"] = $amountBalance;
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
                $result["errorMessage"] = "หมายเลขบัญชีต้องเป็นตัวเลข 10 หลัก";
                return $result;
            }
        }else
        {
            $result["errorMessage"]= "หมายเลขบัญชีต้องเป็นตัวเลข 10 หลัก";
            return $result;
        }
        return $result;
    }
}