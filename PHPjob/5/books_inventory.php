<?php
  require_once('db_connect.php');
  require_once('function.php');

  check_user_logged_in();
  $pdo = db_connect();

  try {
    $sql = "SELECT * from books ORDER BY title DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    die();
  }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/style.css">
  <title>在庫一覧</title>
</head>
<body>  
  <div class="books-inventory">
    <h1>在庫一覧画面</h1>
    <div>
      <button onclick="location.href='add_book.php'">新規登録</button>
      <button onclick="location.href='logout.php'" class="logout-button">ログアウト</button>
    </div>
    <table>
      <thead>
        <th>タイトル</th>
        <th>発売日</th>
        <th>在庫数</th>
        <th></th>
      </thead>
      <tbody>
        
      <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
          <td><?php echo $row['title'] ?></td>
          <td><?php echo $row['date'] ?></td>
          <td><?php echo $row['stock'] ?></td>
          <td><a href="delete_book.php?id=<?php echo $row['id']; ?>">削除</a></td>
        </tr>
          
      <?php } ?>
      </tbody>
    </table>
    <div class="links">
      <a href="logout.php">ログアウト</a>
    </div>
  </div>
  
</body>
</html>