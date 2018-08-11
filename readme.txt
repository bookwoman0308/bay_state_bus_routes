This is a simple Drupal 7 custom module that ingests data from the Massachusetts Bay Transportation Authority API and displays schedule information for each route. Routes are sorted by type, with the background and text colors designated by the API route attributes.  Yes, I realize the name Bay State Bus Routes does not encompass all of the transit route types! My apologies for the lack of precision on this code exercise’s naming conventions.

To add this module to any Drupal 7 installation, there are no configurations required except for downloading and enabling X Autoload.

Git clone this repo: https://github.com/bookwoman0308/bay_state_bus_routes

In the module directory, make sure to run composer update to gather all required dependencies.

Then enable the Xautoload module and the Bay State Bus Routes module.

drush en -y xautoload
drush en -y bay_state_bus_routes

Clear the caches, and the initial page will render at: path/to/webroot/bay-state


Related resources:

The MBTA API for developers page: https://www.mbta.com/developers/v3-api

The Swagger documentation for the API: https://api-v3.mbta.com/docs/swagger/index.html
