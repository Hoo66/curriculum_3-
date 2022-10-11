<link rel="stylesheet" href="style.css">

<?php 
//[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
$portNumber = $_POST['portnumber'];
$lang = $_POST['lang'];
$command = $_POST['command'];
$name = $_POST['name'];
$portNumAns = $_POST['portNumAns'];
$langAns = $_POST['langAns'];
$commandAns = $_POST['commandAns'];


//選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する
function checkAnswers($choice, $correctAnswer) {
  if($choice === $correctAnswer) {
    echo '正解！';
  } else {
    echo '残念・・・';
  }
}

?>
<p><?php echo $name; ?>さんの結果は・・・？</p>
<p>①の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php checkAnswers($portNumber, $portNumAns) ?>
<p>②の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php checkAnswers($lang, $langAns) ?>

<p>③の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php checkAnswers($command, $commandAns) ?>