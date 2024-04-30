<?php

class UserModel {

static public function getUserInfo($table, $item, $value) {
    // Establish a database connection
    $pdo = connection::connect();

    // Perform a database query to retrieve user information based on the provided table, item, and value
    $query = "SELECT * FROM $table WHERE $item = :value";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':value', $value);
    $stmt->execute();

    // Fetch user information as an associative array
    $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);

    return $userInfo;
}

}

