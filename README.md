## Note
- All Endpoints have a prefix of '/api'.
- Hit the 'api/generate/data' endpoint to load all required data.

## Setting up locally
- Clone the repository.
- Cd into the repository from your terminal.
- Run composer install.
- Set up your .env file with your database details (You can rename the .env.example file to .env).
- Run php artisan key:generate to generate an app key.
- Fire up your API testing tool e.g Postman
- Run php artisan migrate to create all tables.
- Hit the 'api/generate/data' endpoint to load all required data.
- Start testing. :)

## Online Access
- If you wish to access the API online [here](https://game-catalog-api.herokuapp.com/)