<?php

require_once 'DBConnection.php';

class ServiceAuthentication{

	private static $data;

    public static function accountAuthenticationProvider(string $accNo): array {
    	/*ServiceAuthentication::readFile();
    	$result = array("accNo" => '', "accName" => '', "accBalance" => '');
    	$found = false;

    	foreach($GLOBALS['data'] as $account)
    	{
    		if(strcmp($account["accNo"], $accNo) == 0)
    		{
    			$result["accNo"] = $account["accNo"];
	    		$result["accName"] = $account["accName"];
	    		$result["accBalance"] = $account["accBalance"];
	    		$found = true;
	    		break;
    		}
    	}
    	
    	if(!$found)
    	{
    		throw new AccountInformationException("Account number : {$accNo} not found.");
    	}
    	return $result;*/

        return DBConnection::accountInformationProvider($accNo);
    }

    /*private function readFile(): void 
    {
    	if($GLOBALS['data'] === NULL)
    	{
    		$GLOBALS['data'] = array();
    		$stubDatabaseFile = "./serviceauthentication/database.txt";
			$objDatabaseOpen = fopen($stubDatabaseFile, "r");
			if($objDatabaseOpen)
			{
				while(!feof($objDatabaseOpen))
				{
					$line = fgets($objDatabaseOpen);
					$explodedLine = explode(",", $line);
					$subArray = array("accNo" => $explodedLine[0], "accName" => $explodedLine[1], "accBalance" => $explodedLine[2]);
					array_push($GLOBALS['data'], $subArray);
				}
				fclose($objDatabaseOpen);
			}
    	}
    }

    private function writeFile(): void
    {
    	if($GLOBALS['data'] === NULL)
    	{
    		return;
    	}
    	$stubDatabaseFile = "./serviceauthentication/database.txt";
		$objDatabaseOpen = fopen($stubDatabaseFile, "w");
		if($objDatabaseOpen)
		{
			foreach($GLOBALS['data'] as $account)
			{
				$line = $account["accNo"] . "," . $account["accName"] . "," . $account["accBalance"];
				fwrite($objDatabaseOpen, $line);
			}
			fclose($objDatabaseOpen);
		}
    }

    public static function updatedBalance(string $accNo, int $updatedBalance): bool
    {
    	ServiceAuthentication::readFile();
    	$index = 0;
        $updated = false;

        foreach($GLOBALS['data'] as $account)
        {
            if(strcmp($account["accNo"], $accNo) == 0)
            {
                $GLOBALS['data'][$index]["accBalance"] = $updatedBalance;
                $updated = true;
                break;
            }
            $index++;
        }

        if(!$updated)
        {
            return false;
        }
        ServiceAuthentication::writeFile();
        return true;
    }*/
}
