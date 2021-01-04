<?php

function redirect($path)
{
    header("Location: $path");
    exit();
}
function secure($var, $pdo)
{
    $var = mysqli_real_escape_string($pdo, htmlspecialchars(trim($var)));
}
