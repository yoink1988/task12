<?php

define('ROOT_DIR', __DIR__.'../..');

define('TEMPLATE', ROOT_DIR.'/templates/index.php');



define ("MYSQL_HOST", "mysql:host=localhost;dbname=test;charset=utf8");
//define ("MYSQL_DB_NAME", "user1");
define ("MYSQL_USER", "root");
define ("MYSQL_PASS", "");
define ("MYSQL_TABLE_NAME", "tbl");

define ("POSTGRE_HOST", "pgsql:host=localhost;dbname=test");
//define ("POSTGRE_DB_NAME", "test");
define ("POSTGRE_USER", "postgres");
define ("POSTGRE_PASS", "");
define ("POSTGRE_TABLE_NAME", "pgtest");
define ("POSTGRE_PORT" , "5432");

define ("DB_MYSQL" , 1);
define ("DB_POSTGRE" , 2);

define ("DB_DRIVER" , 1);


