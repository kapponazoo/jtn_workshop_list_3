<?php

session_start();
$lid = $_SESSION["lid"];


//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//   POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る
//2. $id = POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更

//1. POSTデータ取得
$workshop_title = $_POST["workshop_title"];
$workshop_teacher = $_POST["workshop_teacher"];
$workshop_date = $_POST["workshop_date"];
$workshop_description = $_POST["workshop_description"];
$workshop_type = $_POST["workshop_type"];
$category_type = $_POST["category_type"];
$level_type = $_POST["level_type"];
$workshop_fee = $_POST["workshop_fee"];
$belongings = $_POST["belongings"];
$reservation = $_POST["reservation"];
$facility_name = $_POST["facility_name"];
$facility_add = $_POST["facility_add"];
$pref = $_POST["pref"];
$workshop_url = $_POST["workshop_url"];
$contact = $_POST["contact"];
$id     = $_POST["id"];
$userid = $lid;


////画像の受け取り
if (isset($_FILES['image'])) {//送信ボタンが押された場合
    // var_dump($_FILES);
    // exit();
      $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
      $image .= '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);//アップロードされたファイルの拡張子を取得
      $file = "images/$image";
    
      if (!empty($_FILES['image']['name'])) {//ファイルが選択されていれば$imageにファイル名を代入
          move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $image);//imagesディレクトリにファイル保存
          if (exif_imagetype($file)) {//画像ファイルかのチェック
              $message = '画像をアップロードしました';
    
          } else {
              $message = '画像ファイルではありません';
            }
          }};

// // チェックボックスの値を取得
// $category_type = $_POST['category_type'];
//配列を文字列にする

if (isset($_POST['category_type']) && is_array($_POST['category_type'])) {
  $category_type = implode("、", $_POST["category_type"]);
}

//2. DB接続します
include("funcs.php");
sschk();
$pdo = db_conn();

//３．データ登録SQL作成
$sql = "UPDATE jtn_ws_table SET workshop_title=:workshop_title,image=:image,workshop_teacher=:workshop_teacher,workshop_date=:workshop_date,workshop_description=:workshop_description,workshop_type=:workshop_type,category_type=:category_type,level_type=:level_type,workshop_fee=:workshop_fee,belongings=:belongings,reservation=:reservation,facility_name=:facility_name,facility_add=:facility_add,pref=:pref,workshop_url=:workshop_url,contact=:contact,userid=:userid WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':workshop_title', $workshop_title,   PDO::PARAM_STR);
$stmt->bindValue(':image', $image,   PDO::PARAM_STR);
$stmt->bindValue(':workshop_teacher', $workshop_teacher,   PDO::PARAM_STR);
$stmt->bindValue(':workshop_date', $workshop_date,   PDO::PARAM_STR);
$stmt->bindValue(':workshop_description', $workshop_description,  PDO::PARAM_STR);
$stmt->bindValue(':workshop_type', $workshop_type,   PDO::PARAM_STR);
$stmt->bindValue(':level_type', $level_type,   PDO::PARAM_STR);
$stmt->bindValue(':category_type', $category_type,   PDO::PARAM_STR);
$stmt->bindValue(':workshop_fee', $workshop_fee,   PDO::PARAM_STR);
$stmt->bindValue(':belongings', $belongings,   PDO::PARAM_STR);
$stmt->bindValue(':reservation', $reservation,   PDO::PARAM_STR);
$stmt->bindValue(':facility_name', $facility_name,   PDO::PARAM_STR);
$stmt->bindValue(':facility_add', $facility_add,   PDO::PARAM_STR);
$stmt->bindValue(':pref', $pref,   PDO::PARAM_STR);
$stmt->bindValue(':workshop_url', $workshop_url,   PDO::PARAM_STR);
$stmt->bindValue(':contact', $contact,   PDO::PARAM_STR);
$stmt->bindValue(':id',     $id,     PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':userid',     $userid,     PDO::PARAM_STR);  
$status = $stmt->execute(); //実行

//画像の受け取り
if (isset($_FILES['image'])) {//送信ボタンが押された場合
    // var_dump($_FILES);
    // exit();
      $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
      $image .= '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);//アップロードされたファイルの拡張子を取得
      $file = "images/$image";
    
      if (!empty($_FILES['image']['name'])) {//ファイルが選択されていれば$imageにファイル名を代入
          move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $image);//imagesディレクトリにファイル保存
          if (exif_imagetype($file)) {//画像ファイルかのチェック
              $message = '画像をアップロードしました';
    
          } else {
              $message = '画像ファイルではありません';
            }
          }};
          
//４．データ登録処理後
if($status==false){
sql_error($stmt);
}else{
redirect("index.php");
}






?>
