# Simple PHP API Web Week 5 Assignment

This is a simple pure PHP CRUD API.

## Project Structure

![Project Structure](/img/project_structure.png)

## How to Use?

run dev server
> php -S localhost:8000

## API Routes

### http://localhost:8000/api/create.php

no paramter required but if included API will return a specific student based on key given

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
