<?php
  require_once('db_connect.php');
  require_once('function.php');

  check_user_logged_in();

  if (!empty($_POST['add_book'])) {
      if (empty($_POST['title'])) {
          echo 'タイトルが未入力です。';
      }
      if (empty($_POST['date'])) {
          echo '発売日が未入力です。';
      }
      if (empty($_POST['stock'])) {
          echo '在庫数が未入力です。';
      }

      if (!empty($_POST['title']) && !empty($_POST['date']) && !empty($_POST['stock'])) {
          $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
          $date = htmlspecialchars($_POST['date'], ENT_QUOTES);
          $stock = htmlspecialchars($_POST['stock'], ENT_QUOTES);

          $pdo = db_connect();

          try {
              $sql = "INSERT INTO books (title, date, stock) VALUES (:title, :date, :stock)";
              $stmt = $pdo->prepare($sql);
              $stmt->bindParam(':title', $title);
              $stmt->bindParam(':date', $date);
              $stmt->bindParam(':stock', $stock);
              $stmt->execute();
              header("Location: books_inventory.php");
              exit;
          } catch (PDOException $e) {
              echo 'Error: ' . $e->getMessage();
              die();
          }
      }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/style.css">
  <title>本登録</title>
</head>
<body>
  <div class="add-book">
    <h1>本 登録画面</h1>
    <form action="" method="POST">
      <input type="text" name="title" placeholder="タイトル"><br>
      <input type="text" name="date" placeholder="発売日"><br>
      <label for="">在庫数</label>
      <select name="stock">
        <option value="" selected>選択してください</option>
        <?php for($i = 1; $i <= 20; $i++) { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php } ?>
      </select><br>
      <input type="submit" value="登録" name="add_book" id="add_book">
    </form>
    <div class="links">
      <a href="books_inventory.php">在庫一覧画面に戻る</a>
    </div>
  </div>

  
</body>
</html>