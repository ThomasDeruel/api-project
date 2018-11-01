# Api

## How is work ?

1. Step one : `git clone` into a folder.

2 Step two : import the database `mysql -u username -p database_name < db.sql`

3.  Step one : on the same folder, run `php -S localhost:YOUR_PORT` (exemple:8000) or run wamp, xamp etc.

## Read your api(ex for YOUR_PORT = 8080):

    * GET http://localhost:8080/api/v1/artists
    

## Config

[x] check the database connection
[x] check if your data is empty
[] check the properties (artists/instruments/...)
[] check url