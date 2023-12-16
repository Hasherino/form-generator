# Form generator
## Setup

Setup process is simplified by making use of Docker. The app is containerized together with Nginx and Postgresql.

### Requirements

- Docker

### Steps to set up

- Download source files
- Make a copy of `.env.example`, rename it to `.env`
- From root directory run:
  - `docker-compose up -d`
  - `docker-compose exec -T app composer install`
  - `docker-compose exec -T app php artisan key:generate`

The app is accessible on `localhost:8100`
