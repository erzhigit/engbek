Конфигурация с базы данных  в папке incs/connecton
кусок кода php 
```php
<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db = "indikativ_2023";
	
	$connection = mysqli_connect($db_host, $db_user, $db_pass);
    if (mysqli_connect_errno()) {
		printf("Serverde baylanys jok: %s\n", mysqli_connect_error());
	}
	    mysqli_select_db($connection,$db);
		mysqli_set_charset($connection, "utf8")
?>
```
Запустить файл php migrate/createLocale.php

Можно предворительно импортнуть таблицу из файл migrate/locale.sql
