<?php

  require_once('db_connect.php');

  // POSTで送られていれば処理実行
  if(isset($_POST['signUp'])) {
    
    // nameとpassword両方送られてきたら処理実行
    if(!empty($_POST['name']) && !empty($_POST['password'])) {

      $pdo = db_connect();
      $name = $_POST["name"];
      $password = $_POST["password"];

      try {
        $sql = "INSERT INTO users (name, password) VALUES (:name, :password)";
        $stmt = $pdo->prepare($sql);

        // パスワードをハッシュ化
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bindValue(':password', $password_hash);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        echo '登録完了しました';
        header("Location: login.php");
      }catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
        die();
      }
      
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="style/style.css">
  <title>ユーザー登録</title>
</head>
<body>
    <div class="sign-up">
      <h1>ユーザー登録画面</h1>
      <form method="POST" action="">
          <input type="text" name="name" id="name" placeholder="ユーザー名">
          <br>
          <input type="password" name="password" id="password" placeholder="パスワード"><br>
          <input type="submit" value="新規登録" id="signUp" name="signUp">
      </form>
    </div>
</body>
</html>