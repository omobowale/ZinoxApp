### Setup

### To make this application work on your system/environment,

A. Duplicate the .env.example and rename as .env

1. Generate an application key
2. Generate a JWT_SECRET

B. For testing (phpunit testing)

1. Set API_USER_NAME
2. Set API_USER_EMAIL
3. Set API_USER_PASSWORD

### Real Testing:

As a way of testing, I created a login page and a register page, just to show that the token based authentication is working.
Login page is at "/"
Register page is at "/create"

### Unit Testing

1. I created a JWTLoginRegisterTest.php file to assert some tests
2. Also, I created some unit testing that checks that the login and register routes are working as intended. For the unit testing to work,
   i. I created a config/api.php file to contain details of a default user.
   ii. I chose random user for the login test using in-memory database
