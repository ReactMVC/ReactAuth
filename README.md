<div align="center">

<img src="/public/ReactMVC.png" width="200">

# ReactAuth
Simple registration and login project for ReactMVC

</div>

# Documention
Download ReactAuth: 
```
git clone https://github.com/ReactMVC/ReactAuth.git
```
Go to folder:
```
cd ReactAuth
```
set your php version 8.0 or higher.

Download Libraries:
```
composer install
```
Be sure to run it on the domain or subdomain or localhost + port.

Edit .env File :
```
APP_NAME= Your App Name
APP_URL= Your App URL
DB_HOST= Your DB Domain or ip
DB_TYPE= Your DB Type (mysql)
DB_PORT= Your DB Port (3306)
DB_NAME= Database Name
DB_USER= Database User
DB_PASS= Database Password
```

insert database table ( Be sure to set the database collation to utf8mb4_general_ci ) :
```sql
CREATE TABLE users (
  id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(200) NOT NULL,
  password VARCHAR(255) NOT NULL,
  role TINYINT(1) DEFAULT '0'
);
```

Run on localhost:

```
php -S localhost:8000
```
