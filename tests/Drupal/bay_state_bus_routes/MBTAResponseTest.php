<?php

use Drupal\bay_state_bus_routes\MBTA;

class MBTAResponseTest extends \PHPUnit_Framework_TestCase {

   public function test_check_response_works() {

    //Create a fake response to check that the checkResponse method is working
    $response = new StdClass;
    $response->code = 200;
    $response->status_message = 'OK';

    $testMBTA = new MBTA();

    $this->assertTrue($testMBTA->checkResponse($response));
   }

}
