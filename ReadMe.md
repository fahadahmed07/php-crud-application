Simple PHP Crud Application with MySQL & Bootstrap 4.3.1

**INSTRUCTIONS**
--

**Database Credentials**

Open config.php and  you will need to change some values in the mysqli, that represent those of your own database. Change the following -

```php
//  This changes are required
$mysqli = new mysqli('localhost', 'username', 'password', 'database') or die(mysqli_error($mysqli));
```

**Test MySQLi**

Creating a test table in your database -

```mysql
CREATE TABLE IF NOT EXISTS crud_data (
  id int() NOT NULL AUTO_INCREMENT,
  task varchar(255) NOT NULL,
  PRIMARY KEY (id)
);
```
**Thank You!**