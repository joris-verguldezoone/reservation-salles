<?php

function connect()
{
    $pdo = new \PDO('mysql:host=localhost;dbname=reservationsalles;charset=utf8', 'root', '');

    return $pdo;
}
