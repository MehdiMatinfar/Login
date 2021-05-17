<?php

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{


    protected function setUp(): void
    {
        parent::setUp();
        $_POST = array();
    }

    /**
     * @test
     */
    public function TestUnit(): void
    {
        $this->httpPost();
    }


    function httpPost()
    {
        $URL = "http://192.168.43.151/shopping/login/login.php";

        $sendData = array(
            'username' => "mehdimatinfar3",
            'password' => "123456789m",

        );

        $Curl = curl_init($URL);
        curl_setopt($Curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($Curl, CURLOPT_POST, true);
        curl_setopt($Curl, CURLOPT_POSTFIELDS, $sendData);
        curl_setopt($Curl, CURLOPT_COOKIEJAR, 'cookie.txt');
        curl_setopt($Curl, CURLOPT_RETURNTRANSFER, true);

        curl_exec($Curl);
         curl_close($Curl);
          $Info = curl_getinfo($Curl, CURLINFO_HTTP_CODE);


             self::assertEquals(200, $Info);

                 self::assertEmpty($Info,"Not Empty");




    }

}
