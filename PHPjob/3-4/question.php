<link rel="stylesheet" href="style.css">

<?php
  //POST送信で送られてきた名前を受け取って変数を作成
  $name = $_POST['name'];

  //①画像を参考に問題文の選択肢の配列を作成してください。
  $portNumbers = [80, 22, 20, 21];
  $langs = ['PHP', 'Python', 'JAVA', 'HTML'];
  $commands = ['join', 'select', 'insert', 'update'];

  //② ①で作成した配列から正解の選択肢の変数を作成してください
  $correctAnswers = [$portNumbers[0], $langs[3], $commands[1]];
  $portNumAns = $portNumbers[0];
  $langAns = $langs[3];
  $commandAns = $commands[1];

?>
<p>お疲れ様です<?php echo $name; ?>さん</p>
<!--フォームの作成 通信はPOST通信で-->

<form action="answer.php" method="POST">
  <h2>①ネットワークのポート番号は何番？</h2>
  <!--③ 問題のradioボタンを「foreach」を使って作成する-->
  <?php foreach($portNumbers as $value) { ?>
    <label>
      <input type="radio" name="portnumber" value="<?php echo $value; ?>">
      <?php echo $value; ?>
    </label>
  <?php } ?>
  
  <h2>②Webページを作成するための言語は？</h2>
  <!--③ 問題のradioボタンを「foreach」を使って作成する-->
  <?php foreach($langs as $value) { ?>
    <label>
      <input type="radio" name="lang" value="<?php echo $value; ?>">
      <?php echo $value; ?>
    </label>
  <?php } ?>
  
  <h2>③MySQLで情報を取得するためのコマンドは？</h2>
  <!--③ 問題のradioボタンを「foreach」を使って作成する-->
  <?php foreach($commands as $value) { ?>
    <label>
      <input type="radio" name="command" value="<?php echo $value; ?>">
      <?php echo $value; ?>
    </label>
  <?php } ?>

  <!--問題の正解の変数と名前の変数を[answer.php]に送る-->
  <input 
    type="hidden" 
    name="portNumAns" 
    value="<?php echo $portNumAns; ?>"
  >
  <input 
    type="hidden" 
    name="langAns" 
    value="<?php echo $langAns; ?>"
  >
  <input 
    type="hidden" 
    name="commandAns" 
    value="<?php echo $commandAns; ?>"
  >
  <input 
    type="hidden" 
    name="name"
    value="<?php echo $name; ?>"
  >
  <br>
  <button>回答する</button>
</form>