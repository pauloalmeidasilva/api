<?php

/**
 * DB_CONFIG
 * 
 * Configuração para acesso ao banco de dados
 */
define("DB_CONFIG", [
  "driver" => $_ENV['DRIVER'],
  "host" => $_ENV['HOST'],
  "port" => $_ENV['PORT'],
  "dbname" => $_ENV['DATABASE'],
  "username" => $_ENV['USER'],
  "passwd" => $_ENV['PASS'],
  "options" => [
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
      PDO::ATTR_CASE => PDO::CASE_NATURAL
  ]
]);