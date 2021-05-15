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
        // Session::start();
        $url = "";
        $_POST['username']="";
        $_POST['password']="";
        $response = array(
            'username' => urlencode($_POST['username']),
            'password' => urlencode($_POST['password'])

        );
        foreach ($response as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }
        rtrim($fields_string, '&');
        $ch = curl_init();


        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, count($response));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        $result = curl_exec($ch);
        $this->assertEquals(200, curl_getinfo($ch));
        curl_close($ch);

      //  $this->assertEquals('login', $response->original->name());
    }

}
