<h1><img src="images/logo.png" alt="JAPAN TEXTILE NEWS" width="400px"></h1>
<a href="index.php" class="button">ワークショップ</a> 
  
        <?php
if (isset($_COOKIE["PHPSESSID"])) {
    echo '<a href="entry.php" class="button">新規登録</a> ';
    echo '<a href="mypage.php" class="button">マイページ</a> ';
    echo '<a href="logout.php" class="button">ログアウト</a> ';
} else {
    echo '<a href="login.php" class="button">ログイン</a> ';
};

?>
 <a href="user.php" class="button">ユーザー登録</a>


