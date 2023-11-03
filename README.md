# Form generator
## Setup

Setup process is simplified by making use of Docker. The app is containerized together with Nginx and Postgresql.

### Requirements

- Docker

### Steps to set up

- Download source files
- From root directory run:
  - `docker-compose up -d`
  - `docker-compose exec -T app php artisan key:generate`
  - `docker-compose exec -T app composer install`
