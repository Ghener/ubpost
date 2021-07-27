<?php

    $dsn = 'mysql:host=localhost;dbname=ub_post';
    $username = 'root';
    $password = '';
    $options = [];

    try {
        $connection = new PDO($dsn, $username, $password, $options);
    } catch(PDOException $e) {
        
    }