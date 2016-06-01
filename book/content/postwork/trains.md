# Train Distances

The local commuter railroad services a number of towns in Kiwiland. Because of monetary concerns, all of the tracks are *one-way*. That is, a route from Kaitaia to Invercargill does not imply the existence of a route from Invercargill to Kaitaia. In fact, even if both of these routes do happen to exist, they are distinct and are not necessarily the same distance!

The purpose of this problem is to help the railroad provide its customers with information about the routes. In particular, your application must be able to:

- Compute the distance along a certain route.
- Count the number of different routes between two towns.
- Calculate the shortest route between two towns.

## Input

The input is in the form of a directed graph where a node represents a town and an edge represents a route between two towns. The weighting of the edge represents the distance between the two towns. A given route will never appear more than once, and for a given route, the starting and ending town will not be the same town. For the test input, the towns are named using the first few letters of the alphabet from A to E. A route between two towns (A to B) with a distance of 5 is represented as `AB5`.

    AB5
    BC4
    CD8
    DC8
    DE6
    AD5
    CE2
    EB3
    AE7

## Challenges

Calculate the following:

1. The distance of the route `A-B-C`.
1. The distance of the route `A-D`.
1. The distance of the route `A-D-C`.
1. The distance of the route `A-E-B-C-D`.
1. The distance of the route `A-E-D`.
1. The number of trips starting at `C` and ending at `C` with a maximum of `3` stops.
    In the sample data above, there are two such trips: `C-D-C` (2 stops). and `C-E-B-C` (3 stops).
1. The number of trips starting at `A` and ending at `C` with exactly `4` stops.
    In the sample data above, there are three such trips: `A-B-C-D-C`, `A-D-C-D-C`, and `A-D-E-B-C`.
1. The length of the shortest route (in terms of distance to travel) from `A` to `C`.
1. The length of the shortest route (in terms of distance to travel) from `B` to `B`.
1. The number of different routes from C to C with a distance of less than 30.
    In the sample data, the trips are: `C-D-C`, `C-E-B-C`, `C-E-B-C-D-C`, `C-D-C-E-B-C`, `C-D-E-B-C`, `C-E-B-C-E-B-C`, and `C-E-B-C-E-B-C-E-B-C`.

For test input 1 through 5, if no such route exists, output `NO SUCH ROUTE`. Otherwise, follow the route as given; do not make any extra stops! For example, the first problem means to start at city `A`, then travel directly to city `B` (a distance of `5`), then directly to city `C` (a distance of `4`).

### Expected Output:

    9
    5
    13
    22
    NO SUCH ROUTE
    2
    3
    9
    9
    7
