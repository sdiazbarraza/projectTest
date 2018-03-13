# TestAf

### Prerequisites

```
PHP 7.0>
MySQL 5.4>
Laravel 5.5
NodeJS
  Express
  mysql
  bodyParser
Composer
```

### Installing

Clone Repo in folder project
```
git clone https://github.com/simp06/pojectTest /folderProject
```
Install Dependence
```
composer install
```
Create  Database 
```
mysql>CREATE DATABASE testaf;
```

Execute to Migration;
```
php artisan migrate 
```

### Requisites Functions Webservice
*Content-Type Allowed : 
```
application/json
```
*Format json 
```
{"field":"value"..}
```
## Method Allowed Webservice
```
GET,POST
```
### Metod GET /stadistic
Show 20 product most searched & top 5 word like test
```
//host:PORT/quizzes/
```
### Metod POST /search
Search product by keyword
```
//host:PORT/quizzes
```
