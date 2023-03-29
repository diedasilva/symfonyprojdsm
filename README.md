# symfonyprojdsm

This project contains data from the following API: https://www.thecocktaildb.com/api/json/v1/1/search.php?s=margarita

Here are the different steps to initialize the project:

    Clone this repo
    Launch Wamp (for Windows)
    Replace your own information in the .env file if you need to, such as your account for phpMyAdmin in MySQL request.
    Ex: DATABASE_URL="mysql://login:password@127.0.0.1:3306/4-api-platform?serverVersion=8&charset=utf8mb4"

    Type the commands "composer install" & "symfony server:start"
    Create the database with the following steps:
        "php bin/console doctrine:database:create"
        "php bin/console doctrine:migrations:diff"
        "php bin/console doctrine:migrations:migrate"

    Fill it with the fixtures for the Users "php bin/console doctrine:fixtures:load" and the Symfony command for the API data "php bin/console app:commanddata"

    You can create a new user on "/register"

    You can generate a JWT Token with Postman on "/api/login_check" and then enter it in the Swagger window on "/api" to get access, or just use the Login Check tab in "/api" to connect and retrieve the JWT token after. Don't forget to put "Bearer" in front of the token!
    Ex: Bearer nzdnadinaidnaidnnajidanidnaidnaidnaidn
