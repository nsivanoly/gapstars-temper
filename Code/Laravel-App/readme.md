# Assessment l Temper

This APP consists
1. API endpoint which provides the necessary data to the Frontend
2. API is enabled on CORS policy which enables to access on any services.
3. Frontend based on VUE and for the API access it uses axios

## Environment Setup Guide
Clone the repository
~~~
`git clone git@github.com:nsivanoly/gapstars-temper.git`
~~~
 Install the dependencies (change the directory)
 
 `composer install`
 
 `npm install`

## APP Setup Guide
Setup the environment

Create the .env file and generate the APP key

`php artisan key:generate`

Run the migrations

`php artisan migrate`

Import the sample data

`php artisan seed:migrate`

## Run the APP

`php artisan serve`

This will runs the APP on http://127.0.0.1:8000/

### References for the retention calculation
1. https://mixpanel.com/topics/what-is-a-good-app-retention-rate/
2. https://thoughtbot.com/blog/create-a-retention-curve-with-mixpanel-and-google-sheets
3. https://www.braze.com/blog/calculate-retention-rate/
4. https://help.mixpanel.com/hc/en-us/articles/115004546883-Retention-Report-Overview
