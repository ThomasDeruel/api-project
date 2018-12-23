# Api

## How it works ?

1. Step one : `git clone` into a folder.

2. Step two(on command line) : import the database `mysql -u username -p database_name < db.sql`

3.  Step three : on the same folder, run `php -S localhost:YOUR_PORT` or `./server.sh`

## Read your api (ex for YOUR_PORT = 8000):

    * GET http://localhost:8000/api/v1/songs (all music)
    * GET http://localhost:8000/api/v1/songs?id
    * GET http://localhost:8000/api/v1/map
    

## Config

[x] check the database connection

[x] check if your data is empty

[ ] check url
