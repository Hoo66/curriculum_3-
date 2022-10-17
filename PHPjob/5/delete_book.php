<?php
  require_once('db_connect.php');
  require_once('function.php');

  check_user_logged_in();

  $id = $_GET['id'];
  if (empty($id)) {
      header("Location: main.php");
      exit;
  }

  $pdo = db_connect();

  try {
      $sql = "DELETE FROM books where id = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      header("Location: books_inventory.php");
      exit;
  } catch (PDOException $e) {
      echo 'Error: ' . $e->getMessage();
      die();
  }

