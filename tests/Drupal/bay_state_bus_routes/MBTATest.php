<?php

use Drupal\bay_state_bus_routes\MBTA;

class MBTATest extends \PHPUnit_Framework_TestCase {

   public function test_time_render_works() {

    $arrivalTime = "2017-08-14T15:04:00-04:00";

    $testTime = new MBTA();

    $expectedResultTime = "3:04 p.m.";

    $this->assertEquals($expectedResultTime, $testTime->renderTimeFormat($arrivalTime));
   }

}
