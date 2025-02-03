<?php
session_start();
$score = $_SESSION['score'];
echo("<center>最終結果:".$score."</center>");

if($score==10): ?>
    <img src="/quizarchive/images/02.png"  style="display: block; margin: auto;" alt="">
<?php elseif ($score > 6) : ?>
    <img src="/quizarchive/images/20.png"  style="display: block; margin: auto;" alt="">
<?php elseif ($score > 3) : ?>
    <img src="/quizarchive/images/18.png"  style="display: block; margin: auto;" alt="">
<?php elseif ($score > 0) : ?>
    <img src="/quizarchive/images/11.png"  style="display: block; margin: auto;" alt="">
<?php else : ?>
    <img src="/quizarchive/images/13.png"  style="display: block; margin: auto;" alt="">
<?php endif; ?>
<form name="title" action="index.php">
    <button style="display: block; margin: auto;">タイトル画面へ</button>
</form>