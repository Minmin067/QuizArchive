<!DOCTYPE html>
<html lang="ja">
<head>
<title>characters</title>
</head>
<body>
<form name="title" action="index.php">
  <button>タイトル画面へ</button>
</form>
<?php

$db_user = "user";	// ユーザー名
$db_pass = "";	// パスワード
$db_host = "localhost";	// ホスト名
$db_name = "quizarchivedb";	// データベース名
$db_type = "mysql";	// データベースの種類

$dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";

try {
  $pdo = new PDO($dsn, $db_user,$db_pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch(PDOException $Exception) {
  die('エラー :' . $Exception->getMessage());
}


try {
  $sql= "SELECT * FROM quiz ";
  $stmh = $pdo->prepare($sql);
  $stmh->execute();
  $count = $stmh->rowCount();
} catch (PDOException $Exception) {
  print "エラー：" . $Exception->getMessage();
}

if($count < 1){
	print "対応したキャラクターが存在していません。<br>";
}else{
?>

<table border="1">
<tbody>
<tr>
  <th>氏</th><th>名</th><th>誕生日</th><th>所属学園</th><th>部活</th><th>趣味</th><th>キャライメージ</th></tr>
<?php
  while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
?> 
<tr>
<td><?=htmlspecialchars($row['first_name'], ENT_QUOTES)?></td>
<td><?=htmlspecialchars($row['last_name'], ENT_QUOTES)?></td>
<td><?=htmlspecialchars($row['birthday'], ENT_QUOTES)?></td>
<td><?=htmlspecialchars($row['school'], ENT_QUOTES)?></td>
<td><?=htmlspecialchars($row['club'], ENT_QUOTES)?></td>
<td><?=htmlspecialchars($row['hobby'], ENT_QUOTES)?></td>
<td><img src=<?=$row['imageurl']?>>
</td>
</tr>
<?php
}    
?>
</tbody></table>

<?php
}
?>

<form name="title" action="index.php">
    <button>タイトル画面へ</button>
</form>

</body>
</html>
