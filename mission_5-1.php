<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_5-1.php</title>
</head>
<body>

<?php 
    // DB接続設定
    $dsn = 'mysql:dbname=データベース名;host=localhost';
    $user = 'ユーザー名';
    $password = 'パスワード';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    //編集
    if (!empty($_POST["submit3"])&&!empty($_POST["num2"])&&!empty($_POST["pass3"])) {
        $id = $_POST["num2"];
        $pass3 = $_POST["pass3"];
		$username_sql = 'SELECT name1 FROM mission5 WHERE id=:id and pass1=:pass3';
		$stmt = $pdo->prepare($username_sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->bindParam(':pass3', $pass3, PDO::PARAM_STR);
		$stmt->execute();
		$row = $stmt->fetch();
		$name2 = $row['name1'];
		
		$username_sql = 'SELECT comment1 FROM mission5 WHERE id=:id and pass1=:pass3';
		$stmt = $pdo->prepare($username_sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->bindParam(':pass3', $pass3, PDO::PARAM_STR);
		$stmt->execute();
		$row = $stmt->fetch();
		$comment2 = $row['comment1'];
    }
?>

<br/>【投稿フォーム】<br/>
<form method="post" action="">
    <input type="text" name="str1" placeholder="名前"><br>
    <input type="text" name="str2" placeholder="コメント"><br>
    <input type="password" name="pass1" placeholder="パスワード"><br>
    <input type="submit" name="submit1" value="送信">
</form>
<br/>【削除フォーム】<br/>
<form method="post" action="">
    <input type="num" name="num1" placeholder="削除対象番号"><br>
    <input type="password" name="pass2" placeholder="パスワード"><br>
    <input type="submit" name="submit2" value="削除">
</form>
<br/>【編集フォーム】<br/>
<form method="post" action="">
    <input type="num" name="num2" placeholder="編集対象番号"><br>
    <input type="password" name="pass3" placeholder="パスワード"><br>
    <input type="submit" name="submit3" value="編集"><br>
    <br><input type="text" name="str3" placeholder="名前" value="<?php if (!empty($_POST["submit3"])&&!empty($_POST["num2"])&&!empty($_POST["pass3"])) { echo $name2; }?>"><br>
    <input type="text" name="str4" placeholder="コメント" value="<?php if (!empty($_POST["submit3"])&&!empty($_POST["num2"])&&!empty($_POST["pass3"])) { echo $comment2; }?>"><br>
    <input type="hidden" name="num3" value="<?php if (!empty($_POST["submit3"])&&!empty($_POST["num2"])) { echo $id; }?>">
    <input type="password" name="pass4" placeholder="パスワード"><br>
    <input type="submit" name="submit4" value="送信">
</form>
</form>

<?php
//エラー一覧
if(!empty($_POST["submit1"])&& empty($_POST["str1"])){
    echo "<br>"."!-------------!"."<br>"."<br>"."エラー："."名前を入力してください"."<br>"."<br>"."!-------------!"."<br>";
}
if(!empty($_POST["submit1"])&& !empty($_POST["str1"])&& empty($_POST["str2"])){
    echo "<br>"."!-------------!"."<br>"."<br>"."エラー："."コメントを入力してください"."<br>"."<br>"."!-------------!"."<br>";
}
if(!empty($_POST["submit1"])&& !empty($_POST["str1"])&& !empty($_POST["str2"])&& empty($_POST["pass1"])){
    echo "<br>"."!-------------!"."<br>"."<br>"."エラー："."パスワードを入力してください"."<br>"."<br>"."!-------------!"."<br>";
}
if(!empty($_POST["submit2"])&& empty($_POST["num1"])){
    echo "<br>"."!-------------!"."<br>"."<br>"."エラー："."数字を入力してください"."<br>"."<br>"."!-------------!"."<br>";
}
if(!empty($_POST["submit2"])&& !empty($_POST["num1"])&& empty($_POST["pass2"])){
    echo "<br>"."!-------------!"."<br>"."<br>"."エラー："."パスワードを入力してください"."<br>"."<br>"."!-------------!"."<br>";
}
if(!empty($_POST["submit3"])&& empty($_POST["num2"])){
    echo "<br>"."!-------------!"."<br>"."<br>"."エラー："."数字を入力してください"."<br>"."<br>"."!-------------!"."<br>";
}
if(!empty($_POST["submit3"])&& !empty($_POST["num2"])&& empty($_POST["pass3"])){
    echo "<br>"."!-------------!"."<br>"."<br>"."エラー："."パスワードを入力してください"."<br>"."<br>"."!-------------!"."<br>";
}
if(!empty($_POST["submit4"])&& empty($_POST["str3"])){
    echo "<br>"."!-------------!"."<br>"."<br>"."エラー："."名前を入力してください"."<br>"."<br>"."!-------------!"."<br>";
}
if(!empty($_POST["submit4"])&& !empty($_POST["str3"])&& empty($_POST["str4"])){
    echo "<br>"."!-------------!"."<br>"."<br>"."エラー："."コメントを入力してください"."<br>"."<br>"."!-------------!"."<br>";
}
if(!empty($_POST["submit4"])&& !empty($_POST["str3"])&& !empty($_POST["str4"])&& empty($_POST["pass4"])){
    echo "<br>"."!-------------!"."<br>"."<br>"."エラー："."パスワードを入力してください"."<br>"."<br>"."!-------------!"."<br>";
}
?>

<?php
    // DB接続設定
    $dsn = 'mysql:dbname=tb250386db;host=localhost';
    $user = 'tb-250386';
    $password = '3zWUuvP7a5';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    //パスワードエラー
    if (!empty($_POST["submit2"])&&!empty($_POST["num1"])&&!empty($_POST["pass2"])) {
        $id = $_POST["num1"];
		$userpass_sql = 'SELECT pass1 FROM mission5 WHERE id=:id';
		$stmt = $pdo->prepare($userpass_sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		$row = $stmt->fetch();
		$userpass = $row['pass1'];
		if ($userpass != $_POST["pass2"]){
		    echo "<br>"."!-------------!"."<br>"."<br>"."エラー："."パスワードが間違っています"."<br>"."<br>"."!-------------!"."<br>";
		}
    }
    if (!empty($_POST["submit3"])&&!empty($_POST["num2"])&&!empty($_POST["pass3"])) {
        $id = $_POST["num2"];
		$userpass_sql = 'SELECT pass1 FROM mission5 WHERE id=:id';
		$stmt = $pdo->prepare($userpass_sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		$row = $stmt->fetch();
		$userpass = $row['pass1'];
		if ($userpass != $_POST["pass3"]){
		    echo "<br>"."!-------------!"."<br>"."<br>"."エラー："."パスワードが間違っています"."<br>"."<br>"."!-------------!"."<br>";
		}
    }
?>

<br>-------------------------------<br>
【投稿一覧】<br><br>

<?php 
    // DB接続設定
    $dsn = 'mysql:dbname=tb250386db;host=localhost';
    $user = 'tb-250386';
    $password = '3zWUuvP7a5';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    //新規投稿
    if (!empty($_POST["submit1"])&&!empty($_POST["str1"])&&!empty($_POST["str2"])&&!empty($_POST["pass1"])) {
        $name1 = $_POST["str1"];
        $comment1 = $_POST["str2"]; 
        $date = date("Y年m月d日 H時i分s秒");
        $pass1 = $_POST["pass1"];
        $sql = "INSERT INTO mission5 (name1, comment1, date ,pass1) VALUES (:name1, :comment1 ,:date ,:pass1)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name1', $name1, PDO::PARAM_STR);
        $stmt->bindParam(':comment1', $comment1, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':pass1', $pass1, PDO::PARAM_STR);
        $stmt->execute();
    }
    
    //削除
    elseif (!empty($_POST["submit2"])&&!empty($_POST["num1"])&&!empty($_POST["pass2"])) {
        $id = $_POST["num1"];
        $pass2 = $_POST["pass2"];
        $sql = 'delete from mission5 where id=:id and pass1=:pass2';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':pass2', $pass2, PDO::PARAM_STR);
        $stmt->execute();
    }
    
    //編集
    elseif (!empty($_POST["submit4"])&&!empty($_POST["str3"])&&!empty($_POST["str4"])&&!empty($_POST["pass4"])) {
        $name2 = $_POST["str3"];
        $comment2 = $_POST["str4"];
        $id = $_POST["num3"];
        $pass4 = $_POST["pass4"];
        $sql = 'UPDATE mission5 SET name1=:name1,comment1=:comment1,pass1=:pass4 WHERE id=:id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name1', $name2, PDO::PARAM_STR);
        $stmt->bindParam(':comment1', $comment2, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':pass4', $pass4, PDO::PARAM_STR);
        $stmt->execute();
    }
    
    //idリセット　　
        $sql = 'ALTER TABLE mission5 auto_increment = 1';
        $stmt = $pdo->query($sql);
    
    //表示
    $sql = 'SELECT * FROM mission5';
    $stmt = $pdo->query($sql);
    $results = $stmt->fetchAll();
    foreach ($results as $row){
        echo $row['id'].',';
        echo $row['name1'].',';
        echo $row['comment1'].',';
        echo $row['date'].'<br>';
    echo "<hr>";
    }
?>

</body>
</html>