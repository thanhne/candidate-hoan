# Simple CRUD Rest API
This Simple CRUD Rest API using CodeIgniter 4 performs backend operations for Create, Read, Update, and Delete via Postman application.

## Requirement:
1. Install Git https://git-scm.com/downloads
2. Install Composer https://getcomposer.org/download/
3. Install Postman https://www.postman.com/downloads/

## Configure .env File
Open the folder ci-4-crud and edit the .env file using an editor such as Visual Studio Code (VSCode) or Sublime Text. Look for the DATABASE section and edit the following lines to match your database configuration:
```
database.default.hostname = your_hostname
database.default.database = your_database
database.default.username = your_username
database.default.password = your_password
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = your_port
```

## Database
Open phpMyAdmin or Navivat, and create a new database. For example, the database name can be ci-4-crud.


## Installation & Usage
Open the folder ci-4-crud, then run the terminal / Git Bash / Command Prompt (CMD), and execute the following commands:
```
composer update
php spark migrate
php spark serve
```

## Using Simple CRUD Rest API with Postman
Several methods can be used in Postman as follows:

### Get all data Projects

- Response Method: **GET**
- Request URL: http://localhost:8080/api/projects

Example response result:
```
[
    {
        "id": "1",
        "name": "Example update",
        "description": "Updated",
        "created_at": null,
        "updated_at": "2024-07-30 04:35:52",
        "deleted_at": null
    }
]
```

### Get data Project by id
For example, the **ID** of the Project is **2**
- Response Method: **GET**
- Request URL: http://localhost:8080/api/projects/2

Contoh response result:
```
{
    "id": "2",
    "name": "Example 2",
    "description": "Open University\n",
    "created_at": "2024-07-30 04:31:37",
    "updated_at": "2024-07-30 04:31:37",
    "deleted_at": null
}
```

### Create data Project JSON Object
- Response Method: **POST**
- Request URL: http://localhost:8080/projects
- Body >> form-data >> Bulk Edit

Example:
```
name:New Project
description:Lorem description ,...
```


### Update data Project JSON Object
For example, the **ID** of the Project is **2**
- Response Method: **PUT**
- Request URL: http://localhost:8080/api/projects/3
- Body >> form-data >> Bulk Edit

Example:
```
{
name: Project updated
description:Lorem description ,...
}
``` 


### Delete data Project
For example, the **ID** of the Project is **2**
- Response Method: DELETE
- Request URL: http://localhost:8080/api/projects/4

Example response result:

```
{
    "message": "Deleted Successfully"
}
```
