<?php

function connect()
{
    $pdo = new PDO('mysql:host=localhost;dbname=reservation-salles;charset=utf8', 'root', '');

    return $pdo;
}
