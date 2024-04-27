

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ワークショップ登録</title>
  <link rel="stylesheet" href="css/picnic.min.css" >
  <link rel="stylesheet" href="css/style.css" >
  <script src="js/imagedrop.js"></script>


</head>
<body>

<!-- Head[Start] -->
<header>
    <?php include("menu.php"); ?>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form action="insert.php" method="post" enctype="multipart/form-data">
  <div class="jumbotron">
   <fieldset>
    <h1>ワークショップを登録してください</h1>
    <h2>ワークショップタイトル</h2>
<p class="answer"><input type="text" name="workshop_title"></p>
<h2>出来上がりのイメージ
</h2>
<P>画像の上にイメージファイルをドロップするか画像をクリックしてファイルを指定してください</p>
<div style="width: 400px"> <!-- this div just for demo display -->
  <label class="dropimage">
    <input title="Drop image or click me" type="file" name="image">
  </label>
</div>
<h2>開催日と時間</h2>
    <p class="answer"><input type="text" name="workshop_date"></p>
   <h2>講師</h2>
    <p class="answer"><input type="text" name="workshop_teacher"></p>
    <h2>内容</h2>
    <p class="answer"><textArea name="workshop_description" rows="4" cols="40"></textArea></p>
    
    <h2>ワークショップタイプ</h2>
<p>
<label><input type="radio" name="workshop_type" id="workshop_type01" value="ハンズオン"><span class="checkable">ハンズオン</span></label>
<label><input type="radio" name="workshop_type" id="workshop_type02" value="デモンストレーション"><span class="checkable">デモンストレーション</span></label>
<label><input type="radio" name="workshop_type" id="workshop_type03" value="ワークショップ"><span class="checkable">ワークショップ</span></label>
</p>    
     <h2>対象者</h2>
     <p>
     <label><input type="radio" name="level_type" id="level_type01" value="初心者"><span class="checkable">初心者</span></label>
     <label><input type="radio" name="level_type" id="level_type02" value="中級者"><span class="checkable">中級者</span></label>
     <label><input type="radio" name="level_type" id="level_type03" value="上級者"><span class="checkable">上級者</span></label>
</p>

   
<h2>種別</h2>
<p>
<label><input type="checkbox" name="category_type[]" value="織り"><span class="checkable">織り</span></label>
<label><input type="checkbox" name="category_type[]" value="染め"><span class="checkable">染め</span></label>
<label><input type="checkbox" name="category_type[]" value="刺繍"><span class="checkable">刺繍</span></label>
<label><input type="checkbox" name="category_type[]" value="キルト"><span class="checkable">キルト</span></label>
<label><input type="checkbox" name="category_type[]" value="アート"><span class="checkable">アート</span></label>
</p>


<h2>受講料</h2>
<p class="answer"><input type="text" name="workshop_fee"></p>
<h2>持ち物</h2>
<p class="answer"><input type="text" name="belongings"></p>

<h2>予約</h2>
<p>
<label><input type="radio" name="reservation" id="reservation_type01" value="予約必須"><span class="checkable">予約必須</span></label>
<label><input type="radio" name="reservation" id="reservation_type02" value="予約可能"><span class="checkable">予約可能</span></label>
<label><input type="radio" name="reservation" id="reservation_type03" value="予約不要"><span class="checkable">予約不要</span></label>
</p>
<h2>会場名</h2>
<p class="answer"><input type="text" name="facility_name"></p>
<h2>ワークショップ会場住所</h2>
<p class="answer"><input type="text" name="facility_add"></p>


<h2>都道府県</h2>
<select name="pref" class="answer">
  <option value="" selected>都道府県</option>
  <option value="北海道">北海道</option>
  <option value="青森県">青森県</option>
  <option value="岩手県">岩手県</option>
  <option value="宮城県">宮城県</option>
  <option value="秋田県">秋田県</option>
  <option value="山形県">山形県</option>
  <option value="福島県">福島県</option>
  <option value="茨城県">茨城県</option>
  <option value="栃木県">栃木県</option>
  <option value="群馬県">群馬県</option>
  <option value="埼玉県">埼玉県</option>
  <option value="千葉県">千葉県</option>
  <option value="東京都">東京都</option>
  <option value="神奈川県">神奈川県</option>
  <option value="新潟県">新潟県</option>
  <option value="富山県">富山県</option>
  <option value="石川県">石川県</option>
  <option value="福井県">福井県</option>
  <option value="山梨県">山梨県</option>
  <option value="長野県">長野県</option>
  <option value="岐阜県">岐阜県</option>
  <option value="静岡県">静岡県</option>
  <option value="愛知県">愛知県</option>
  <option value="三重県">三重県</option>
  <option value="滋賀県">滋賀県</option>
  <option value="京都府">京都府</option>
  <option value="大阪府">大阪府</option>
  <option value="兵庫県">兵庫県</option>
  <option value="奈良県">奈良県</option>
  <option value="和歌山県">和歌山県</option>
  <option value="鳥取県">鳥取県</option>
  <option value="島根県">島根県</option>
  <option value="岡山県">岡山県</option>
  <option value="広島県">広島県</option>
  <option value="山口県">山口県</option>
  <option value="徳島県">徳島県</option>
  <option value="香川県">香川県</option>
  <option value="愛媛県">愛媛県</option>
  <option value="高知県">高知県</option>
  <option value="福岡県">福岡県</option>
  <option value="佐賀県">佐賀県</option>
  <option value="長崎県">長崎県</option>
  <option value="熊本県">熊本県</option>
  <option value="大分県">大分県</option>
  <option value="宮崎県">宮崎県</option>
  <option value="鹿児島県">鹿児島県</option>
  <option value="沖縄県">沖縄県</option>
</select>
<h2>詳細情報URL</h2>
<p class="answer"><input type="url" name="workshop_url"></p>
<h2>お問い合わせ先</h2>
<p class="answer"><input type="text" name="contact"></p>
<input type="hidden" name="userid" value="<?=$v["userid"]?>">
<br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
