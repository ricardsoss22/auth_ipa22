<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Include DB, Validator
  require "Validator.php";
  require "Database.php";
  $config = require "config.php";
  $db = new Database($config);

  // Trim, validēt datus
  $errors = [];

  if (!Validator::email($_POST["email"])) {
    $errors["email"] = "Invalid email";
  }

  if (!Validator::string($_POST["password"], min: 6)) {
    $errors["password"] = "Password too short";
  }

  $query = "SELECT * FROM users WHERE email = :email";
  $params = [":email" => $_POST["email"]];
  $user = $db->execute($query, $params)->fetch();

  if ($user) {
    $errors["email"] = "e-mail already in use";
  }


  // Saglabāsim DB, izmantojot bind params, ar:
  if(empty($errors)) {
    $query = "INSERT INTO users (email, password)
                  VALUE (:email, :password)";
  $sql_params = [
    ":email" => $_POST["email"],
    ":password" => password_hash($_POST["password"], PASSWORD_BCRYPT)
  ];
  $db->execute($query,$sql_params);
  header("Location: /login");



  $_POST["email"];
  $_POST["password"];
    }
  }


$title = "Register";
require "views/auth/register.view.php";