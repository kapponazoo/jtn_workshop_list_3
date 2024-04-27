<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>ログイン</title>
<link rel="stylesheet" href="css/picnic.min.css" >
<link rel="stylesheet" href="css/style.css" >
</head>
<body>

<!-- Head[Start] -->
<header>
    <?php include("menu.php"); ?>
</header>
<!-- Head[End] -->

<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form name="form1" action="login_act.php" method="post">
<fieldset class="flex two">
  <label><input type="text" name="lid"></label>
  <label><input type="password" name="lpw"></label>
</fieldset>
<input type="submit" value="ログイン">

</form>



</body>
</html>