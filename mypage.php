<?php
session_start();
$lid = $_SESSION["lid"];


// $userid     = ;

// echo ($userid);

// 1 PHP
include("funcs.php");
sschk();
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM jtn_ws_table WHERE userid = :lid";

// SQLクエリを準備し、ログインユーザーのデータを取得する


$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid',    $lid,    PDO::PARAM_STR);  
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}


//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
// $json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ワークショップ</title>
<link rel="stylesheet" href="css/picnic.min.css" >
<link rel="stylesheet" href="css/style.css" >

</head>
<body id="main">
<!-- Head[Start] -->
<header>

    <?php include("menu.php"); ?>

</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<p style="background-color: #cccccc;"><?=$_SESSION["lid"]?>さんこんにちは！</p>
<div>
<ul>  

      
      <?php foreach($values as $v){ ?>
     
<li><a href="detail.php?id=<?=h($v["id"])?>"><button><?=h($v["workshop_title"])?>の更新</button></a>
<br>L<a href="delete.php?id=<?=h($v["id"])?>"><button>削除</button></a></li>
  

      <?php } ?>

      </ul>  
</div>
<!-- Main[End] -->

<!-- <script>
  const a = '<?php echo $json; ?>';
  console.log(JSON.parse(a));
</script> -->
</body>
</html>
