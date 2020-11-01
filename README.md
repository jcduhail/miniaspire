## Requierements

PHP >=7.3

## Installation

- composer install
- npm install && npm run dev

- Edit the .env file to set the correct location of the sqlite file :

DB_DATABASE=[ABSOLUTE_PASS_TO_MINISAPIRE]/miniaspire/database/db.sqlite

- Either run "php artisan serve" then go to http://127.0.0.1:8000
Or set your appache document root to miniaspire/public folder

## What it uses

- Jetstream to have a build-in auth with registration and login
- "Request a loan" in the users menu, the loan is considered as accepted (no admin validation), but has to be paid in the dashboard
- The dashboard list the current loans, in green payment is done, is red payment has to be done
- A "Pay" button make simple "payment" (i.e just update the last payment date)

Testing account :

email : test@mail.com

password : testtest