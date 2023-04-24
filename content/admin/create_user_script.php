<?php
require_once('../../dao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get form data
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password_confirm = $_POST['password_verify'];

  // Verify that passwords match
  if ($password !== $password_confirm) {
    // Passwords don't match, display error message
    echo 'Error: passwords do not match.';
    exit;
  }

  // Hash password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Create new user in database
  if (create_user($nom, $prenom, $email, $hashed_password)) {
    // User created successfully, redirect to user list
    header('Location:/?page=admin&gest=usr');
    exit;
  } else {
    // Error creating user, display error message
    echo 'Error creating user.';
    exit;
  }
}
?>