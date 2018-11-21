<?php

require_once 'DBConnection.php';

class ServiceAuthentication{

    public static function accountAuthenticationProvider(string $accNo): array {
    	//read file
    	$stubDatabaseFile = "./serviceauthentication/database.txt";
		$objDatabaseOpen = fopen($stubDatabaseFile, "r");
		$data = array();
		if($objDatabaseOpen)
		{
			while(!feof($objDatabaseOpen))
			{
				$line = fgets($objDatabaseOpen);
				$explodedLine = explode(",", $line);
				$subArray = array("accNo" => $explodedLine[0], "accName" => $explodedLine[1], "accBalance" => $explodedLine[2]);
				array_push($data, $subArray);
			}
			fclose($objDatabaseOpen);
		}
		else {
			$result["accName"] = $stubDatabaseFile;
		}
		//read file

    	$result = array("accNo" => '',"accName" => '' ,"accBalance" => '');
    	$found = false;
    	foreach($data as $account)
    	{
    		if(strcmp($account["accNo"], $accNo) == 0)
    		{
    			$found = true;
    			$result["accNo"] = $account["accNo"];
	    		$result["accName"] = $account["accName"];
	    		$result["accBalance"] = $account["accBalance"];
    		}
    	}
    	if(!$found)
    	{
    		$result["accNo"] = "0000000000";
    		$result["accName"] = "Tester";
    		$result["accBalance"] = 5000;
    	}

    	return $result;
    	
    	/*if(strcmp($accNo, "0000000000") == 0)
    	{
    		throw new AccountInformationException("Account number : {$accNo} not found.");
    	}
    	//valid other than XXXXXXXXXX
    	else
    	{
    		$result["accNo"] = $accNo;
    		$result["accName"] = "Tester";
    		$result["accBalance"] = 100000;
    	}*/

    	//////////////////////
    	/*$stubDatabaseFile = "./serviceauthentication/database.txt";
		$objDatabaseOpen = fopen($stubDatabaseFile, "r");
		$data = array();
		if($objDatabaseOpen)
		{
			while(!feof($objDatabaseOpen))
			{
				$line = fgets($objDatabaseOpen);
				$explodedLine = explode(",", $line);
				$subArray = array("accNo" => $explodedLine[0], "accName" => $explodedLine[1], "accBalance" => $explodedLine[2]);
				array_push($data, $subArray);
				$result["accName"] = $subArray["accName"];
				//echo $file."<br>";
			}
			fclose($objDatabaseOpen);
		}
		else {
			$result["accName"] = $stubDatabaseFile;
		}*/
		/////////////////////////

    	//original
        //return DBConnection::accountInformationProvider($accNo);
    }


}
