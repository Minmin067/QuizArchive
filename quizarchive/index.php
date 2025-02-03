<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>QuizArchive</title>
</head>
<body>
<img src="/quizarchive/images/logo.png" width="640" style="display: block; margin: auto;" alt="">
<?php
session_start();
$_SESSION['score']=0;
$_SESSION['quizcount']=0;
?>
<form name="characters" action="characters.php">
    <button style="display: block; margin: auto;">キャラ一覧</button>
</form>
<form name="quiz" action="quiz.php">
    <button style="display: block; margin: auto;">クイズ</button>
</form>
</body>
</html>