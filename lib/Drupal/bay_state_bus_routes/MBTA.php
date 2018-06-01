<?php

namespace Drupal\bay_state_bus_routes;
use \DateTime;

/*
 *
 * Class that assists with making calls to the MBTA API.
 *
 */
class MBTA {

  // Property declaration.

  private $routeID;

  CONST API_URL = 'https://api-v3.mbta.com/';

  // Method declaration.
  /**
   * Constructor
   */
  public function __construct() {

    //Initalize routeID to zero
    $this->setRouteID(0);

  }

  /**
   * Getters and Setters
   */

  public function getRouteID() {

    return $this->routeID;
  }

  public function setRouteID($routeID) {

    $this->routeID = $routeID;
  }

  /**
  * Helper function used to set up the API call to retrieve all routes.
  */
  public function getRoutes() {

    $url = self::API_URL . 'routes/';

    $options = array(
      'method' => 'GET',
      'headers' => array('Content-Type' => 'application/json'),
    );
  
    $response = drupal_http_request($url, $options);

    return $response;
  }

  /**
  * Helper function used to set up the API call to retrieve all schedule data for one specified route.
  */
  public function getSchedules() {

    $routeID = $this->getRouteID();

    $url = self::API_URL . 'schedules?filter[route]=' . $routeID;

    $options = array(
      'method' => 'GET',
      'headers' => array('Content-Type' => 'application/json'),
    );
  
    $response = drupal_http_request($url, $options);

    return $response;
  }

  /**
  * Helper function used to determine if the API call is successful.
  */
  public function checkResponse($response) {

    return (($response->code == 200) && ($response->status_message == 'OK'));
  }

  /**
  * Helper function used to convert the ISO 8601 time format from the API data into a human-readable format.
  */
  public function renderTimeFormat($arrivalTime) {

    $timeObj = DateTime::createFromFormat(DateTime::ISO8601, $arrivalTime);
    //Format the time for users in the targeted time zone that does not use military time
    $hour = $timeObj->format('H');  //05, 10,  12,  16,  21
    $period = ($hour >= 12) ? 'p.m.' : 'a.m.';
    $usaHour = ($hour > 12) ? ($hour - 12) : $hour;
    $usaHour = ($hour == 0) ? 12 : $usaHour;  //05,  10,  12,  4,  9
    $firstString = substr($usaHour, 0, 1);
    $usaHour = ($firstString == 0) ? substr($usaHour, -1) : $usaHour;
    //Assemble the display time
    $timeDisplay = $usaHour . ':' . $timeObj->format('i') . ' ' . $period;
    return $timeDisplay;
  }

}
