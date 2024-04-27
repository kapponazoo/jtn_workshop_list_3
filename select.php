<?php


//１．関数群の読み込み
include("funcs.php");
//LOGINチェック → funcs.phpへ関数化しましょう！

$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM jtn_ws_table";
$stmt = $pdo->prepare($sql);
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
<div>
    <div class="container jumbotron">

      
      <?php foreach($values as $v){ ?>
        <p class="pref"><?=h($v["pref"])?></p>
        <h2><?=h($v["workshop_title"])?></h2>
        <h3>講師：<?=h($v["workshop_teacher"])?>先生</h3>
        <h3>会場：<?=h($v["facility_name"])?></h3>
        <p>会場住所：<?=h($v["facility_add"])?></p>

        <p><?=h($v["workshop_date"])?></p>
         <div>
         <img src="images/<?=$v["image"]?>" alt="出来上がりのイメージ" width="400px"><br>
          <div>
<p class="icon_list"><?=h($v["workshop_description"])?></p>
<ul>
  <li class="workshop_type"><?=h($v["workshop_type"])?></li>
  <li class="level_type"><?=h($v["level_type"])?></li>
  <li class="category_type"><?=h($v["category_type"])?></li>
  <li class="reservation"><?=h($v["reservation"])?></li>
</ul>
<p>参加費用：<?=h($v["workshop_fee"])?></p>
<p>持ちもの：<?=h($v["belongings"])?></p>
<p>参加費用：<?=h($v["workshop_fee"])?></p>
<p>詳細情報：<?=h($v["workshop_url"])?></p>
<p>お問い合わせ先：<?=h($v["contact"])?></p>
          </div>
         </div>
<a href="detail.php?id=<?=h($v["id"])?>"><button>更新</button></a>
<a href="delete.php?id=<?=h($v["id"])?>"><button>削除</button></a>
        

      <?php } ?>


  </div>
</div>
<!-- Main[End] -->

<!-- <script>
  const a = '<?php echo $json; ?>';
  console.log(JSON.parse(a));
</script> -->
</body>
</html>
