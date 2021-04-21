# Swipester
Swipester is a game where two people are shown various items related to a given subject, such as movies or food, and asked to either like or dislike the item to find items with common approval. Swipester was written with Laravel and Nuxt (Vue ssr)

[App demo](https://swipester.olivernorden.se)

[App showcase](https://olivernorden.se/projects/swipester)

## Set up locally
1. Make sure you have Docker or Docker desktop installed
2. Clone repository
3. Run `docker run --rm -u "$(id -u):$(id -g)" -v $(pwd):/opt -w /opt laravelsail/php80-composer:latest composer install --ignore-platform-reqs` in the repository root. This will install the Laravel dependencies
4. Run `cp .env.example .env` in the repository root. This will add the default env file. This .env file may require changes depending on other running services etc.
5. Run `./vendor/bin/sail up -d`. This will start the local development environment.
6. Run `./vendor/bin/sail npm --prefix ./client i` in the repository root. This will install the clinet dependencies (Nuxt etc.)
7. Run `./vendor/bin/sail artisan migrate` in the repository root. This will build the database
8. Run `./vendor/bin/sail artisan db:seed` in the repository root. This will populate the database with sample data.
9. Access application on localhost:8000
10. In the event of a 502 response code, please wait while the client environment is being set up
