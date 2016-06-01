# Incident Reports Map

Create a simple RESTful client/server application. Your application should consist of two parts:

- A **server** that parses the data contained within [this file](../examples/postwork/reports.yml) and outputs the information in a manner that is usable for your API (e.g. JSON).
- A **client** that requests data from the server and displays the information on a Google Map.

Your application should plot the data on the map using whatever manner seems most logical. You can use whatever icons you wish to display the reports, but bonus points will be given for using your own icon(s) instead of the built-in ones.

## Notes:

- The data file is formatted in [YAML](http://www.yaml.org).
- The location of each report is a latitude and longitude coordinate, where latitude is called `t` and longitude is called `n`.
- The data currently contains 100 points. What considerations would have to be made were we trying to display 100,000? Or 100,000,000? Adjust your solution to optimize for these larger hypothetical datasets.
