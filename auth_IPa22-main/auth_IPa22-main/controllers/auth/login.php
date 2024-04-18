<?php

$title = "Login";

//1.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include DB, Validator
    require "Validator.php";
    require "Database.php";
    $config = require "config.php";
    $db = new Database($config);

    $query = "SELECT * FROM users WHERE email = :email";
    $params = [
        ":email" => $_POST["email"]
        
    ];
    $user = $db-> execute($query, $params)->fetch();
   if($user && password_verify($_POST["password"], $user["password"])); {

} else {
    $errors["email"] = "Invalid email or password"
}

}


require "views/auth/login.view.php";