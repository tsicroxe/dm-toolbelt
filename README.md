# Dm's Toolbelt
This project is my submission for CPSC 597 for the completion of CSU Fullerton's MSE program.


## Installation

1. Ensure you have the Docker app running.
2. If you have a local `mysql` server running, stop it and ensure port 3306 is open
3. Run the command `composer install`. If you don't already have composer it can be obtained [here](https://getcomposer.org/).
4. Have Node and NPM installed. https://nodejs.org/en/
5. Run the command `npm install`.

## Startup

1. From the project root directory, run `docker-compose up -d`. This will begin the development server.
2. Run `cp .env.example .env`. This will copy the contents from the .env.example file into a newly created .env
3. You know need to generate a key using `php artisan key:generate`. This will be located in the .env we just created under APP_KEY.
4. And that should be it! If for whatever reason you are having issues the [Laravel 8 Documentation](https://laravel.com/docs/8.x/releases) is fairly extensive and can be helpful. Also you can look specifically under [Laravel Sail](https://laravel.com/docs/8.x/sail) for other information regarding the Docker buildspec used.
5. IF you plan on doing any development work you may run `npm run watch` to watch for any changes on your front end.