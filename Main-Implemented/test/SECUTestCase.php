<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/TestHelper.php';

class SECUTestCase extends TestCase {

   public function databaseTest(){
       return new TestHelper();
   }


}