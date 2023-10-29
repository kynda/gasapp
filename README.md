GasApp
===============================================================================

A simple application for tracking a vehicle's gas usage.

Features
-------------------------------------------------------------------------------

- Log's gas usage, price, and mileage/trip on one or more vehicles
- Automatically calculates MPG/trip, average MPG, $/gallon, avg. miles/tank for
  a given vehicle.

Installation
-------------------------------------------------------------------------------

### Docker

1. Clone this repo to a local system
2. Copy `.data.base.db` to `.data.db`
2. Run `docker compose up`
3. Run `composer install`
4. GasApp should now be running on http://localhost:8080

Time is built using
-------------------------------------------------------------------------------

- The PHP Slim Framework
- PHP 8.2
- SQLITE
- Htmx
- Materialize CSS
- PDO

ChangeLog
-------------------------------------------------------------------------------

### Version 0.0.0
#### 2023-10-28

- Initial Commit
