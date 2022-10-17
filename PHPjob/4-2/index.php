<?php
  require_once("getData.php");

  $data = new getData();

  $usersdata = $data->getUserData();
  $first_name = $usersdata["first_name"];
  $last_name = $usersdata["last_name"];
  $last_login = $usersdata["last_login"];

  $postsdata = $data->getPostData();

?>

<html>
  <head>
    <link rel="stylesheet" href="style/style.css">
  </head>
  <body>
    <header>
      <h1><img src="img/logo.png" alt="ロゴ"></h1>
      <div>
        <p class="login-name">ようこそ<?php echo $last_name.$first_name; ?>さん</p>
        <p class="login-date">最終ログイン日：<?php echo $last_login; ?></p>
      </div>
    </header>
    <main>
      <table>
        <thead>
            <tr>
              <th>記事ID</th>
              <th>タイトル</th>
              <th>カテゴリ</th>
              <th>本文</th>
              <th>投稿日</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row = $postsdata->fetch(PDO::FETCH_ASSOC)) { ?>
              <tr> 
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['title']; ?></td>
                  <td><?php echo $row['category_no']; ?></td>
                  <td><?php echo $row['comment']; ?></td>
                  <td><?php echo $row['created']; ?></td>
              </tr>

            <?php } ?>  
        </tbody>
        
      </table>
    </main>
    <footer>
      <p>Y&I group, inc.</p>
    </footer>
  </body>
</html>