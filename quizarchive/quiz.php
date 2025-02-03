<!DOCTYPE html>
<html lang="ja">
<head>
<title>quiz</title>
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

$_SESSION['flag']=1;
$quiz_count = $_SESSION['quizcount'];
$quiz_count++;
$_SESSION['quizcount'] = $quiz_count;
echo('第'.$quiz_count.'問');
$quiz_num = rand(1,18);
$quiz_type = rand(1,6);
$_SESSION['quiznum'] = $quiz_num;
$_SESSION['quiztype'] = $quiz_type;

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
?>

<table border="1">
<tbody>
<tr>
  <th>氏</th><th>名</th><th>誕生日</th><th>所属学園</th><th>部活</th><th>趣味</th><th>キャライメージ</th></tr>
<?php
  while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
    switch($quiz_type){
      case 1://名字
?> 
<tr>
<!-- <td><?=htmlspecialchars($row['first_name'], ENT_QUOTES)?></td> -->
<form action="answer.php" method="post">
<td><input type="text" name='anspost'></td>
<td><?=htmlspecialchars($row['last_name'], ENT_QUOTES)?></td>
<td><?=htmlspecialchars($row['birthday'], ENT_QUOTES)?></td>
<td><?=htmlspecialchars($row['school'], ENT_QUOTES)?></td>
<td><?=htmlspecialchars($row['club'], ENT_QUOTES)?></td>
<td><?=htmlspecialchars($row['hobby'], ENT_QUOTES)?></td>
<td><img src=<?=$row['imageurl']?>>
</td>
</tr>


<?php
      break;
      case 2://名前
        ?>
<tr>
<td><?=htmlspecialchars($row['first_name'], ENT_QUOTES)?></td>

<!-- <td><?=htmlspecialchars($row['last_name'], ENT_QUOTES)?></td> -->
<form action="answer.php" method="post">
<td><input type="text" name='anspost'></td>

<td><?=htmlspecialchars($row['birthday'], ENT_QUOTES)?></td>
<td><?=htmlspecialchars($row['school'], ENT_QUOTES)?></td>
<td><?=htmlspecialchars($row['club'], ENT_QUOTES)?></td>
<td><?=htmlspecialchars($row['hobby'], ENT_QUOTES)?></td>
<td><img src=<?=$row['imageurl']?>>
</td>
</tr>

<?php
      break;
      case 3://誕生日
        ?>
<tr>
<td><?=htmlspecialchars($row['first_name'], ENT_QUOTES)?></td>

<td><?=htmlspecialchars($row['last_name'], ENT_QUOTES)?></td>

<!-- <td><?=htmlspecialchars($row['birthday'], ENT_QUOTES)?></td> -->
<form action="answer.php" method="post">
<td><input type="text" name='anspost'></td>

<td><?=htmlspecialchars($row['school'], ENT_QUOTES)?></td>
<td><?=htmlspecialchars($row['club'], ENT_QUOTES)?></td>
<td><?=htmlspecialchars($row['hobby'], ENT_QUOTES)?></td>
<td><img src=<?=$row['imageurl']?>>
</td>
</tr>

<?php
      break;
      case 4://所属学園
        ?>
<tr>
<td><?=htmlspecialchars($row['first_name'], ENT_QUOTES)?></td>

<td><?=htmlspecialchars($row['last_name'], ENT_QUOTES)?></td>

<td><?=htmlspecialchars($row['birthday'], ENT_QUOTES)?></td>

<!-- <td><?=htmlspecialchars($row['school'], ENT_QUOTES)?></td> -->
<form action="answer.php" method="post">
<td><input type="text" name='anspost'></td>

<td><?=htmlspecialchars($row['club'], ENT_QUOTES)?></td>
<td><?=htmlspecialchars($row['hobby'], ENT_QUOTES)?></td>
<td><img src=<?=$row['imageurl']?>>
</td>
</tr>

<?php
      break;
      case 5://部活
        ?>
<tr>
<td><?=htmlspecialchars($row['first_name'], ENT_QUOTES)?></td>

<td><?=htmlspecialchars($row['last_name'], ENT_QUOTES)?></td>

<td><?=htmlspecialchars($row['birthday'], ENT_QUOTES)?></td>

<td><?=htmlspecialchars($row['school'], ENT_QUOTES)?></td>

<!-- <td><?=htmlspecialchars($row['club'], ENT_QUOTES)?></td> -->
<form action="answer.php" method="post">
<td><input type="text" name='anspost'></td>

<td><?=htmlspecialchars($row['hobby'], ENT_QUOTES)?></td>
<td><img src=<?=$row['imageurl']?>>
</td>
</tr>

<?php
      break;
      case 6://趣味
        ?>
<tr>
<td><?=htmlspecialchars($row['first_name'], ENT_QUOTES)?></td>

<td><?=htmlspecialchars($row['last_name'], ENT_QUOTES)?></td>

<td><?=htmlspecialchars($row['birthday'], ENT_QUOTES)?></td>

<td><?=htmlspecialchars($row['school'], ENT_QUOTES)?></td>

<td><?=htmlspecialchars($row['club'], ENT_QUOTES)?></td>

<!-- <td><?=htmlspecialchars($row['hobby'], ENT_QUOTES)?></td> -->
<form action="answer.php" method="post">
<td><input type="text" name='anspost'></td>

<td><img src=<?=$row['imageurl']?>>
</td>
</tr>


<?php
    break;
    }
}    

?>
</tbody></table>
<input type="submit" value="採点" >
</form>

<?php

?>
<?php
}

?>

</body>
</html>
