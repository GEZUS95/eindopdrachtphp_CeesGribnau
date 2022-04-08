# Docker template for PHP projects
This repository provides a starting template for PHP application development.

It contains:
* NGINX webserver
* PHP FastCGI Process Manager with PDO MySQL support
* MariaDB (GPL MySQL fork)
* PHPMyAdmin

## Installation

1. Install Docker Desktop on Windows or Mac, or Docker Engine on Linux.
1. Clone the project

## Usage

In a terminal, run:
```bash
docker-compose up
```

NGINX will now serve files in the app/public folder. Visit localhost in your browser to check.
PHPMyAdmin is accessible on localhost:8080

If you want to stop the containers, press Ctrl+C. 
Or run:
```bash
docker-compose down
```

The user's that are preconfigured are:

* " mark@inholland.nl " with password " mark " <- this is an user
* " admin@example.com " with password " admin " <- this is an admin
* " test@email.com " with password " test " <- this is also an user
* " company@email.com " with password " test " <- this is an company

The link to my Github Repo: https://github.com/GEZUS95/eindopdrachtphp_CeesGribnau


