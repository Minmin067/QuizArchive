<!DOCTYPE html>
<html lang="ja">
<head>
<title>answer</title>
</head>
<body>
<?php
session_start();
$db_user = "user";	// ユーザー名
$db_pass = "";	// パスワード
$db_host = "localhost";	// ホスト名
$db_name = "quizarchivedb";	// データベース名
$db_type = "mysql";	// データベースの種類


$dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";
$quiz_num = $_SESSION['quiznum'];
$quiz_type = $_SESSION['quiztype'];
$score = $_SESSION['score'];
$quiz_count = $_SESSION['quizcount'];
try {
  $pdo = new PDO($dsn, $db_user,$db_pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  //print "接続しました... <br>";
} catch(PDOException $Exception) {
  die('エラー :' . $Exception->getMessage());
}

// POSTされたデータを受け取ります。
// $search_key = '%' . $_POST['search_key'] . '%'; 

try {
  $sql= "SELECT * FROM quiz where id='". $quiz_num ."'";
  $stmh = $pdo->prepare($sql);
  // $stmh->bindValue(':last_name',  $search_key, PDO::PARAM_STR );
  // $stmh->bindValue(':first_name', $search_key, PDO::PARAM_STR );
  $stmh->execute();
  $count = $stmh->rowCount();
  //print "検索結果は" . $count . "件です。<br>";
  
} catch (PDOException $Exception) {
  print "エラー：" . $Exception->getMessage();
}

if($count < 1){
	print "IDに対応しているキャラクターがいません。<br>";
}else{
  if($_SESSION['flag']==1){
    while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
      switch($quiz_type){
        case 1:
          $ans_db = $row['first_name'];
          break;
        case 2:
          $ans_db = $row['last_name'];
          break;
        case 3:
          $ans_db = $row['birthday'];
          break;
        case 4:
          $ans_db = $row['school'];
          break;
        case 5:
          $ans_db = $row['club'];
          break;
        case 6:
          $ans_db = $row['hobby'];
          break;
      }
      
    }
    $ans_post = $_POST['anspost'];
    echo('答え：'.$ans_db);
    if($ans_post==$ans_db){
      echo '<script>alert("正解")</script>';
      $score++;
      $_SESSION['score']=$score;
      $_SESSION['flag']=0;
    }else{
      echo '<script>alert("不正解")</script>';
      $_SESSION['flag']=0;
    }
  }else{
    // echo("不正な操作が行われました");
  }
}
?>
<?php if ($quiz_count < 10) { ?>
  <form name="quiz" action="quiz.php">
    <button style="display: block; margin: auto;">次の問題へ</button>
</form>
    <?php }else{?>
      <form name="quiz" action="result.php">
        <button style="display: block; margin: auto;">最終結果</button>
    <?php } ?>



</body>
</html>
