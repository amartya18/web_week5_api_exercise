# Simple PHP API Web Week 5 Assignment

This is a simple pure PHP CRUD API.

## Project Structure

![Project Structure](/img/project_structure.png)

## How to Use?
1. change variables in db/conn_db.php based on your database configuration

![Project Structure](/img/db_variables.png)

2. run dev server with the following command (linux/mac)

> php -S localhost:8000

3. open one of the HTML file in [/client](/client) to test! :D

__if it does not work:__

change the url of all files in [/api](/api) (directory) to your coresponding development server url.

## API Routes

### http://localhost:8000/api/read.php

no parameter required but if included, API will return a specific student based on key given

| parameter     | data type     | requirement  |
| ------------- | ------------- | ------------ |
| key           | string        | optional     |

### http://localhost:8000/api/create.php

| parameter     | data type     | requirement  |
| ------------- | ------------- | ------------ |
| Studentid     | string        | required     |
| Name          | string        | required     |
| pwdStudent    | string        | required     |

### http://localhost:8000/api/update.php

| parameter     | data type     | requirement  |
| ------------- | ------------- | ------------ |
| key           | string        | required     |
| Studentid     | string        | required     |
| Name          | string        | required     |
| pwdStudent    | string        | optional     |

### http://localhost:8000/api/delete.php

| parameter     | data type     | requirement  |
| ------------- | ------------- | ------------ |
| key           | string        | required     |
| Studentid     | string        | required     |
