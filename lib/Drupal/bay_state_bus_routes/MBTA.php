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
  CONST API_KEY = '6d7970cabacd4881ac48a4863aa8b8d7';

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
      'headers' => array('Content-Type' => 'application/json', 'Authorization' => self::API_KEY),
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
      'headers' => array('Content-Type' => 'application/json', 'Authorization' => self::API_KEY),
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
    $timeDisplay = $timeObj->format('g:i a');
    return $timeDisplay;
  }

}
